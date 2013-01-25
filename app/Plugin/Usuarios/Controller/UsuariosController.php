<?php
App::uses('Usuario.UsuariosAppController', 'Controller');
App::uses('CakeLog', 'Core');
App::uses('Router', 'Core');
App::uses('Sanitize', 'Utility');
/**
 * 
 * Administración de usuarios usuarios internos, login y edición de cuenta de usuario.
 * @plugin Usuarios
 * @controller Usuario 
 * @author Ricardo Portillo
 *
 */
class UsuariosController extends UsuariosAppController {
	const ATTEMTS = 5;
	public $helpers=array('Renamezero.ReCaptcha');
	public $components = array('Renamezero.ReCaptcha');
	/**
  	 * Acciones que se permiten sin permiso
  	 *
   	 */
	function beforeFilter() {
   		$this->Auth->allow('registro', 'activar');
   		parent::beforeFilter();
	}
	/**
	 * Listado de todos los usuarios Internos del sistema
	 * Este listado se obtiene paginado
	 */
	public function index() {
		$this->paginate = array(
   				 'Usuario' => array(
        					'contain' => array(),
        					'conditions'=>array('Usuario.rol_id<4'),
        					'joins'=>array(array(
									'table'=>'roles',
									'alias'=>'Rol',
									'type'=>'INNER',
									'conditions'=>array('Rol.id=Usuario.rol_id')
							)),
				'fields'=>array(' Usuario.id', 'Usuario.email', 'Usuario.nombre_completo', 
								'Rol.nombre', 'Usuario.telefono',  'Usuario.celular', 'Usuario.ultimo_acceso', 'Usuario.activo'),
   				 )
		);
		$this->set('usuarios', $this->paginate('Usuario'));
	}
	/**
	 * Listado de todos los clientes del sistema
	 * Este listado se obtiene paginado
	 */
	public function clientes() {
		$this->paginate = array(
   				 'Usuario' => array(
        					'contain' => array(),
        					'conditions'=>array('Usuario.rol_id=4'),
        					'joins'=>array(array(
									'table'=>'roles',
									'alias'=>'Rol',
									'type'=>'INNER',
									'conditions'=>array('Rol.id=Usuario.rol_id')
							)),
				'fields'=>array(' Usuario.id', 'Usuario.email', 'Usuario.nombre_completo', 
								'Rol.nombre', 'Usuario.telefono',  'Usuario.celular', 'Usuario.ultimo_acceso', 'Usuario.activo'),
   				 )
		);
		$this->set('usuarios', $this->paginate('Usuario'));
	}
	
	/**
	 * Login de usuario. Se utiliza el componente Auth
	 * para autenticarse.
	 */
	public function login() {
		$this->layout = 'login';
		//Titulo para la página del Login. Antes solo se mostraba "Usuarios"
		$this->set('title_for_layout', __('Acceso al sistema ::: INFOTAXI',true));

		$this->set('userAttempts', intval($this->Session->read('Auth.attempts')));
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				//Check if the captcha is ok
				if ($this->_checkCaptcha()) {
					$this->Session->delete('Auth.attempts');
					$this->Usuario->read(null, $this->Auth->user('id'));
					$this->Usuario->set('ultimo_acceso', date('Y-m-d H:i:s'));
					$this->Usuario->save();
					$this->redirect(($this->Auth->user('rol_id')==Configure::read('rol.cliente'))?'/taxis/home':$this->Auth->loginRedirect);
				}
			}else if (!empty($this->request->data)) {
		    	$this->Session->write('Auth.attempts', intval($this->Session->read('Auth.attempts')) + 1);
		    	if (intval($this->Session->read('Auth.attempts')) >= self::ATTEMTS) {
		        //Enviar un error fatal solamente una vez.
		       		 $errorType = (intval($this->Session->read('Auth.attempts')) == self::ATTEMTS) ? 'fatal' : 'error';
		       		 $this->log(sprintf(__("Se alcanzó el número intento fallidos. Nombre de usuario: %s", true), 
		             $this->request->data['Usuario']['nombre_usuario']), $errorType);
		    	}else {
		        	$this->log(__("Intento de login fallido.", true), 'error');
		   	 	} 
		    	if ($this->referer() != Configure::read('AdminLogin')) {
		    		$this->_setMessage($this->Auth->loginError, self::ERROR);	
		    		$this->redirect($this->Auth->logoutRedirect);
		  		}
			}
		}
	}
	
	/**
	 * Cierra una sesion de usuario
	 */
	public function logout() {
		$action = $this->Auth->logout();
		//$this->Session->del($this->Auth->sessionKey);
		$this->Session->destroy();
		$this->redirect(array('action' => 'login'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Usuario->id = $id;
		if (!$this->Usuario->exists()) {
			throw new NotFoundException(__('Invalid usuario'));
		}
		$this->set('usuario', $this->Usuario->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Usuario->create();
			$this->request->data['Usuario']['fecha_creacion']=date('Y-m-d H:i:s');
			if ($this->Usuario->save($this->request->data)) {
				$this->_setMessage(__('Se ha creado un nuevo usuario'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->_setMessage(__('No se pudo guardar el nuevo usuario, intente nuevamente.'), self::ERROR);
			}
		}
		//Busco el Rol
		$this->loadModel('Rol');
		$this->set('roles', $this->Rol->find('list', array('fields'=>array('id', 'nombre'))));
		$this->set('rol_id', array());
	}
	/**
 * Registro method
 *
 * @return void
 */
	public function registro() {
		if ($this->request->is('ajax')) {
			$this->layout="ajax";
		}else{
			$this->layout="public";
		}
		if ($this->request->is('post')) {
			$this->Usuario->create();
			$this->request->data['Usuario']['fecha_creacion']=date('Y-m-d H:i:s');
			if ($this->Usuario->registro($this->request->data)) {
				$this->request->data=array();
				$this->_setMessage(__('Se ha realizado su registro, pronto le llegara un correo de confirmación'));
			} else {
				$this->_setMessage(__('No se pudo guardar el nuevo usuario, intente nuevamente.'), self::ERROR);
			}
		}
	}
	public function activar($token){
		if ($this->request->is('get')) {
			if($this->Usuario->activarCuenta($token)):
				$this->_setMessage(__('Se ha realizado su registro, pronto le llegara un correo de confirmación'));
				$this->redirect(array('action' => 'login'));
			else:
				$this->_setMessage(__('Su cuenta ya ha sido activada previamente'), self::INFO);
				$this->redirect(array('action' => 'login'));
			endif;
		}	
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param int $id
 * @return void
 */
	public function edit($id = null) {
		$this->Usuario->id = $id;
		if (!$this->Usuario->exists()) {
			throw new NotFoundException(__('Invalid usuario'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Usuario->save($this->request->data)) {
				$this->_setMessage(__('Se han actualizado los datos del usuario'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->_setMessage(__('No se pudo actualizar los datos del usuario. Intente nuevamen.'),self::ERROR);
			}
		} else {
			$this->request->data = $this->Usuario->read(null, $id);
			//Busco los datos del usuario
			$this->request->data = $this->Usuario->read(null, $id);
			//Busco los Roles
			$this->loadModel('Rol');
			$this->set('roles', $this->Rol->find('list', array('fields'=>array('id', 'nombre'))));
			$this->set('rolId', $this->Auth->user('rol_id'));
			$rolId = (trim($this->request->data['Usuario']['rol_id']) == '') ? array() : explode(',', $this->request->data['Usuario']['rol_id']);
			$this->set('rol_id', $rolId);
		}
	}
/**
 * editClient  
 *	Permite a la administración editar a un cliente  a diferencia de las opciones del 
 * de las opciones del cliente el Administrador puede cambiar el correo, y activar o 
 * desactivar la cuenta
 * @throws NotFoundException
 * @param int $id
 * @return void
 */
	public function editCliente($id = null) {
		$this->Usuario->id = $id;
		if (!$this->Usuario->exists()) {
			throw new NotFoundException(__('Invalid usuario'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Usuario->save($this->request->data)) {
				$this->_setMessage(__('Se han actualizado los datos del usuario'));
				$this->redirect(array('action' => 'clientes'));
			} else {
				$this->_setMessage(__('No se pudo actualizar los datos del usuario. Intente nuevamente.'),self::ERROR);
			}
		} else {
			if ($this->request->is('ajax')){
				$this->layout="ajax";
			} 
			$this->request->data = $this->Usuario->read(null, $id);
		}
	}
/**
 * editarClient  
 * Permite al cliente editar sus datos de usuario
 * @throws NotFoundException
 * @param int $id
 * @return void
 */
	public function editarCliente($id = null) {
		if ($this->request->is('ajax')){
			$this->layout="ajax";
			$this->Usuario->id = $id;
	
			if ($this->request->is('post') || $this->request->is('put')) {
				$save=true;
				if ($this->Usuario->save($this->request->data)) {
					$this->_setMessage(__('Se han actualizado los datos del usuario'));
					$success=1;
					$datos=$this->request->data;
				} else {
					$this->_setMessage(__('No se pudo actualizar los datos del usuario. Intente nuevamen.'),self::ERROR);
					$success=0;
					$datos=$this->Usuario->invalidFields();
				}
				$this->set(compact('save', 'datos', 'success'));
			} else {
				$this->request->data = $this->Usuario->read(null, $id);
			}
		}else{
			throw new NotFoundException(__('Invalido Acceso'));
		}
	}

/**
 * delete method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Usuario->id = $id;
		if (!$this->Usuario->exists()) {
			throw new NotFoundException(__('Invalid usuario'));
		}
		if ($this->Usuario->delete()) {
			$this->Session->setFlash(__('Usuario deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Usuario was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
	
	/*Enlista los datos del usuario*/
	public function ver($id = null) {

	}
	
	/**
	 * 
	 * Función que identifica la versión de IE
	 */
	private function ieversion() {
 		ereg('MSIE ([0-9]\.[0-9])',$_SERVER['HTTP_USER_AGENT'],$reg);
 		return (!isset($reg[1]))?-1:floatval($reg[1]);
	}
	private function _checkCaptcha() {
	    if (intval($this->Session->read('Auth.attempts')) < self::ATTEMTS) {
	        return true;
	    }
	    if ($this->ReCaptcha->validCaptcha()) {
	        return true;
	    }
	    //Logout
	    $this->Auth->logout();
	    $this->setFlashMessage("El texto que ha introducido no coincide con las palabras del control de seguridad. Por favor intente otra vez.", self::ERROR);
	    if ($this->referer() == Configure::read('AdminLogin')) {
	    	$this->redirect(array('action' => 'login'));
	    }else{
	    	$this->redirect(array('plugin' => 'transparencia', 'controller' => 'transparencia','action' => 'index'));
	    }
	}
	
}
