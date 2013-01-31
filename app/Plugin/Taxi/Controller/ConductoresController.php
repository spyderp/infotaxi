<?php
App::uses('Taxi.TaxiAppController', 'Controller');
App::uses('Sanitize', 'Utility');
/**
 * Conductores Controller
 *
 * @property Conductor $Conductor
 */
class ConductoresController extends TaxiAppController {
	public $components = array('ImageUploader');
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Conductor->recursive = 0;
		$this->set('conductores', $this->paginate());
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Conductor->create();
			$data=Sanitize::clean($this->request->data);
			$file = $data['file']['image'];
			$upload=$this->unploadConfig($file);
			$msg='';
			if($upload['bool']):
				$this->request->data['Conductor']['image']=$upload['file_path'];
				$this->request->data['Conductor']['thumb']=$upload['thumb_path'];
			else:
				$this->request->data['Conductor']['image']='';
				$msg="Error al subir archivo:".$upload['error_message'];
			endif;
			
			if ($this->Conductor->save($this->request->data)) {
				$this->_setMessage(__('Se ha guardado el conductor'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->_setMessage(__('No se pudo guardar el conductor. Intente nuevamente. '.$msg), self::ERROR);
			}
		}
		$taxis = $this->Conductor->Taxi->find('list',array('fields'=>array('id', 'placa_carro')));
		$this->set(compact('taxis'));
	}
	public function anotherAdd($id= null) {
		if ($this->request->is('post')) {
			if ($this->Conductor->save($this->request->data)) {
				$this->_setMessage(__('Se ha guardado el conductor'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->_setMessage(__('No se pudo guardar el conductor. Intente nuevamente. '.$msg), self::ERROR);
			}
		}else{
			$this->request->data = $this->Conductor->read(null, $id);
		}
		$taxis = $this->Conductor->Taxi->find('list',array('fields'=>array('id', 'placa_carro')));
		$this->set(compact('taxis'));
			
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Conductor->id = $id;
		if (!$this->Conductor->exists()) {
			throw new NotFoundException(__('Invalid conductor'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			$data=Sanitize::clean($this->request->data);
			$file = $data['file']['image'];
			$upload=$this->unploadConfig($file);
			if($upload['bool']):
				$this->request->data['Conductor']['image']=$upload['file_path'];
				$this->request->data['Conductor']['thumb']=$upload['thumb_path'];
			else:
				$msg="Error al subir archivo:".$upload['error_message'];
			endif;
			if ($this->Conductor->save($this->request->data)) {
				$this->_setMessage(__('Se han actualizado los datos'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->_setMessage(__('No se pudo actualizar los datos. Intente nuevamente'), self::ERROR);
			}
		} else {
			$this->request->data = $this->Conductor->read(null, $id);
		}
		$img='/'.$this->request->data['Conductor']['thumb'];
		$taxis = $this->Conductor->Taxi->find('list');
		$this->set(compact('taxis', 'img'));
	}
	/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function editarConductor($id = null) {
		if ($this->request->is('ajax')){
			$this->layout="ajax";
			$this->Conductor->id = $id;
			if ($this->request->is('post') || $this->request->is('put')) {
				$save=true;
				$data=Sanitize::clean($this->request->data);
				if ($this->Conductor->save($this->request->data)) {
					$this->_setMessage(__('Se han actualizado los datos'));
					$success=1;
					$datos=$this->request->data;
				} else {
					$this->_setMessage(__('No se pudo actualizar los datos. Intente nuevamente'), self::ERROR);
					$success=0;
					$datos=$this->Conductor->invalidFields();
				}
				$this->set(compact('save', 'datos', 'success'));
			} else {
				$this->request->data = $this->Conductor->read(null, $id);
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
		$this->Conductor->id = $id;
		if (!$this->Conductor->exists()) {
			throw new NotFoundException(__('Invalid conductor'));
		}
		if ($this->Conductor->delete()) {
			$this->_setMessage(__('Conductor Borrado'));
			$this->redirect(array('action' => 'index'));
		}
		$this->_setMessage(__('Conductor was not deleted'), self::ERROR);
		$this->redirect(array('action' => 'index'));
	}
}
