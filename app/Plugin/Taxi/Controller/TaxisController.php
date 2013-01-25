<?php
App::uses('Taxi.TaxiAppController', 'Controller');
App::uses('Sanitize', 'Utility');
/**
 * Taxis Controller
 *
 * @property Taxi $Taxi
 */
class TaxisController extends TaxiAppController {
	public $components = array('ImageUploader');
	public $helpers =array('Qrcode.Qrcode');
	
	function beforeFilter() {
   		$this->Auth->allow('info');
   		parent::beforeFilter();
	}
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Taxi->recursive = 0;
		$this->set('taxis', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Taxi->id = $id;
		if (!$this->Taxi->exists()) {
			throw new NotFoundException(__('Invalid taxi'));
		}
		$this->set('taxi', $this->Taxi->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$data=Sanitize::clean($this->request->data);
			$file = $data['file']['image'];
			$upload=$this->unploadConfig($file);
			$msg='';
			if($upload['bool']):
				$this->request->data['Taxi']['image']=$upload['file_path'];
				$this->request->data['Taxi']['thumb']=$upload['thumb_path'];
			else:
				$this->request->data['Taxi']['image']='';
				$msg="Error al subir archivo:".$upload['error_message'];
			endif;
			$this->Taxi->create();
			if ( $this->Taxi->save($this->request->data)) {
				$this->_setMessage(__('Se ha guardado el nuevo vehiculo'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->_setMessage(__('No se ha podido guardar los datos. por favor intente nuevamente. '.$msg),self::ERROR);
			}
		}
		$marcas = $this->Taxi->Marca->find('list', array('fields'=>array('id','nombre'), 'order'=>'nombre'));
		$usuarios = $this->Taxi->Usuario->find('list', array('fields'=>array('id','cedula'), 'conditions'=>array('rol_id'=>4)));
		$this->set(compact('marcas', 'usuarios', 'estados'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Taxi->id = $id;
		if (!$this->Taxi->exists()) {
			throw new NotFoundException(__('Invalid taxi'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			$data=Sanitize::clean($this->request->data);
			$file = $data['file']['image'];
			$upload=$this->unploadConfig($file);
			$msg='';
			if($upload['bool']):
				$this->request->data['Taxi']['image']=$upload['file_path'];
				$this->request->data['Taxi']['thumb']=$upload['thumb_path'];
			endif;
			if ($this->Taxi->save($this->request->data)) {
				$this->_setMessage(__('Se han actualizado los datos del vehiculo'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->_setMessage(__('No se ha podido actualizar los datos. por favor intente nuevamente'), self::ERROR);
			}
		} else {
			$this->request->data = $this->Taxi->read(null, $id);
		}
		$img='/'.$this->request->data['Taxi']['thumb'];
		$marcas = $this->Taxi->Marca->find('list', array('fields'=>array('id','nombre')));
		$usuarios = $this->Taxi->Usuario->find('list', array('fields'=>array('id','cedula'), 'conditions'=>array('rol_id'=>4)));
		$this->set(compact('marcas', 'usuarios', 'estados', 'img'));
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
		$this->Taxi->id = $id;
		if (!$this->Taxi->exists()) {
			throw new NotFoundException(__('Invalid taxi'));
		}
		if ($this->Taxi->delete()) {
			$this->_setMessage(__('Taxi Borradp'));
			$this->redirect(array('action' => 'index'));
		}
		$this->_setMessage(__('Taxi no pudo ser borrado'), self::ERROR);
		$this->redirect(array('action' => 'index'));
	}

	public function home(){
	
		$groupId=$this->Taxi->find('list', array('conditions'=>array('usuario_id'=>$this->Auth->user('id'))));
		$this->Taxi->Conductor->bindModel(array('hasOne' => array('ConductoresTaxi')));
		$conductor=$this->Taxi->Conductor->find('all', array('conditions'=>array('ConductoresTaxi.taxi_id'=>$groupId)));
		$this->Taxi->contain('Marca');
		$taxi=$this->Taxi->find('all', array('conditions'=>array('usuario_id'=>$this->Auth->user('id'))));
		$user=$this->Taxi->Usuario->find('first', array('conditions'=>array('id'=>$this->Auth->user('id'))));
		$this->set(compact('conductor','taxi', 'user'));
	}
	
	public function info($id){
		$this->layout='mini';
		if ($this->request->is('get')){
				 $id=Sanitize::clean($id);
				$id=Security::rijndael(base64_decode($id.'='), Configure::read('Security.key'), 'decrypt');
				$this->Taxi->contain(array('Usuario', 'Conductor', 'Marca'));
				$this->set('taxi', $this->Taxi->find('first',array('conditions'=>array('Taxi.id'=>$id))));
		}
	}
}
