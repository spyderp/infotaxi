<?php
App::uses('AppController', 'Controller');
/**
 * Contenidos
 *
 * @property Contenidos
 */
class ContenidosController extends AppController {
/**
  	 * Acciones que se permiten sin permiso
  	 *
   	 */
	function beforeFilter() {
   		$this->Auth->allow('inicio','faq', 'contacto', 'servicios');
   		parent::beforeFilter();
	}
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Contenido->recursive = 0;
		$this->set('contenidos', $this->paginate());
		
	}

/**
 * faq method
 *
 *  @return void
 */
	public function faq() {
		if ($this->request->is('ajax')) {
			$this->layout="ajax";
		}else{
			$this->layout="public";
			$this->set('faqs', $this->Contenido->find('list', array('order'=>array('titulo'), 'limit'=>'3', 'fields'=>array('id', 'titulo'))));
		}
		$this->set('contenidos', $this->Contenido->find('all', array('order'=>array('titulo'))));
		
	}
/**
 * faq method
 *
 *  @return void
 */
	public function contacto() {
		if ($this->request->is('ajax')) {
			$this->layout="ajax";
		}else{
			$this->layout="public";
			$this->set('faqs', $this->Contenido->find('list', array('order'=>array('titulo'), 'limit'=>'3', 'fields'=>array('id', 'titulo'))));
		}
		if ($this->request->is('post')) {
			if ($this->Contenido->contacto($this->request->data)) {
				$this->Session->setFlash(__('Mensaje enviado'));
			} else {
				$this->Session->setFlash(__('Ocurrio un error y el mensaje no se pudo enviar intente nuevamente.'), self::ERROR);
			}
		}
	}
/**
 * faq method
 *
 *  @return void
 */
	public function servicios() {
		if ($this->request->is('ajax')) {
			$this->layout="ajax";
		}else{
			$this->layout="public";
			$this->set('faqs', $this->Contenido->find('list', array('order'=>array('titulo'), 'limit'=>'3', 'fields'=>array('id', 'titulo'))));
		}
	}
/**
 * inicio method
 *
 *  @return void
 */
	public function inicio() {
		$this->set('title_for_layout', __('INFOTAXI:::Bienvenidos',true));
		if ($this->request->is('ajax')) {
			$this->layout="ajax";
		}else{
			$this->layout="public";
			$this->set('faqs', $this->Contenido->find('list', array('order'=>array('titulo'), 'limit'=>'3', 'fields'=>array('id', 'titulo'))));
		}
		
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Contenido->create();
			if ($this->Contenido->save($this->request->data)) {
				$this->Session->setFlash(__('Se ha agregado una nueva pregunta'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('No se pudo guardar.'),self::ERROR);
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Contenido->id = $id;
		if (!$this->Contenido->exists()) {
			throw new NotFoundException(__('Invalid historial pago'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Contenido->save($this->request->data)) {
				$this->Session->setFlash(__('Se ha actualizado la pregunta'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('no se pudo guardar.'), self::ERROR);
			}
		} else {
			$this->request->data = $this->Contenido->read(null, $id);
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
		$this->Contenido->id = $id;
		if (!$this->Contenido->exists()) {
			throw new NotFoundException(__('Invalid historial pago'));
		}
		if ($this->Contenido->delete()) {
			$this->Session->setFlash(__('Historial pago deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Historial pago was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
