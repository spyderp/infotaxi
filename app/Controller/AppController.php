<?php

App::uses('Controller', 'Controller');

class AppController extends Controller {
	//Constante de tipo de mensaje de error
	const SUCCESS = 1;
  	const ERROR = 2;
  	const WARNING = 3;
  	const INFO = 4;
	public $theme = 'Infotaxi';
	//Configuración de los helper
	public $helpers = array('Js' => array('Renamezero.Jquery'), 'Renamezero.Formato', 'Renamezero.FormExtend', 'Renamezero.Grid', 'Session', 'Renamezero.HtmlExtend');
	//Configuración de los componentes
	public $components = array( 'Auth' => array(
			'authorize' => 'Controller',
			'loginAction' => array(
				'controller' => 'Usuarios',
				'action' => 'login',
				'plugin' => 'usuarios',
				'admin' => false,
			),
			'authenticate' => array(
            'Form' => array(
				'userModel'=>'Usuario',
                'fields' => array('username' => 'email'),
				'scope'=>array('Usuario.activo'=>1)
            ))
		),'DebugKit.Toolbar', 'RequestHandler', 'Session', 'Usuarios.Permission',);
	/**
	 * Validar el usuario
	 */
	public function beforeFilter() {
		if (isset($this->Auth)) {
			$this->_inicializarAuth();
			$this->__initializeUser();
		}
		
		if($this->action!='login'){
		if (strstr($_SERVER["HTTP_USER_AGENT"], "MSIE")) {  
			$action = $this->Auth->logout();
			$this->Session->destroy();
			$this->redirect(array('controller'=>'usuarios','action' => 'login'));
		}
		}
	}
	public function isAuthorized() {
		if ($this->action == 'myAccount') {
			return true;
		}
		if (!$this->Permission->verifyPrivilege()) {
			$page = Inflector::underscore($this->name) . '/' .$this->action;
		    $this->log(sprintf(__('El usuario %s intentó entrar a la página %s sin permisos', true),
			            $this->Auth->user('nombre_usuario'), $page));
		    $this->_setMessage($this->Auth->authError, self::INFO);
			//$this->cakeError('permissionError', array(array('code' => '404', 'name' => 'Request Inválido', 'message' => 'Usted no tiene permisos para ver esta página')));
			$this->redirect($this->Auth->loginRedirect);
		}
		return true;
	}

	/**
	 * 
	 * Configuración inicial de usuarios autorizados
	 */
	private function _inicializarAuth() {
			$this->Auth->loginAction = array('plugin'=>'usuarios','controller' => 'usuarios', 'action' => 'login');;
			$this->Auth->loginRedirect = array('plugin'=>'usuarios', 'controller' => 'usuarios', 'action' => 'index');;
			$this->Auth->logoutRedirect = array('plugin'=>'usuarios', 'controller' => 'usuarios', 'action' => 'logout');
			$this->Auth->loginError = __('Email / Contraseña inválido', true);
			$this->Auth->authError=__('Usted no esta autorizado para acceder ha esta sección', true);
			$this->Auth->autoRedirect = false;
			//Seteo el usuario
	}
	/**
	 * 
	 * Al acceder al sistema la configuración inicial
	 */
	private function __initializeUser() {
		if (is_string($this->Auth->user('rol_id'))) {	
			$this->set('rolesUsuario', explode(',', $this->Auth->user('rol_id')));
			$this->set('userExterno', $this->Auth->user('interno'));
		}else {
			$this->set('rolesUsuario', array());
		}
		if ($this->Auth) {
			$this->set('usuarioId', $this->Auth->user('id'));
			$this->set('nombreCompleto', $this->Auth->user('nombre').' '.$this->Auth->user('apellido'));
		}
	}
	
		/**
	 * 
	 * Se recrea la función para enviar mensajes con tipo de opciones con Estilo Css predeterminados 
	 * @param String $message Mensaje que aparecera en pantalla
	 * @param Integer $type  Tipo de estilo para el mensaje
	 * @param Boolean $modeReturn Forma de impreón en pantalla, pedeterminado o por div
	 */
	protected function _setMessage($message, $type = self::SUCCESS) {
		$message = (string) $message;
		switch ($type) {
			case self::ERROR :
					$this->Session->setFlash( $message, 'default', array('class'=>'msgError message') );
			break;

			case self::WARNING :
				$this->Session->setFlash( $message, 'default', array('class'=>'warning message') );
				
			break;

			case self::INFO :
				$this->Session->setFlash( $message, 'default', array('class'=>'info message') );
			break;

			default :
				$this->Session->setFlash( $message, 'default', array('class'=>'success message') );
		}
	}
	public function unploadConfig($file, $costumeName=null){
		 $options = array('thumbnail'=>array("max_width"=>320,
                                      "max_height"=>240, 
                                      "path"=>'files/thumbnails/'),
        'max_width'=>600);    
		if(isset($costumeName)):
			$options['custom_name']=$costumeName;
			$options['thumbnail']['custom_name']=$costumeName;
		endif;
		try{
        	//this is where the magic happens we call the function upload using the imageuploader component 
        	$output = $this->ImageUploader->upload($file,'files',$options);
   		}catch(Exception $e){
		    $output = array('bool'=>FALSE,'error_message'=>$e->getMessage());
		}
		return $output;
	}
}
