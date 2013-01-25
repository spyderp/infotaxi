<?php
App::uses('AppController', 'Controller');
/**
 * Marcas Controller
 *
 * @property Marca $Marca
 */
class MarcasController extends TaxiAppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Marca->recursive = 0;
		$this->set('marcas', $this->paginate());
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Marca->create();
			if ($this->Marca->save($this->request->data)) {
				$this->_setMessage(__('TSe guardaron los datos'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->_setMessage(__('No se pudieron guardar los datos. Por favor, intente nuevamente.'), self::ERROR);
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
		$this->Marca->id = $id;
		if (!$this->Marca->exists()) {
			throw new NotFoundException(__('Datos Invalidos'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Marca->save($this->request->data)) {
				$this->_setMessage(__('Se han actualizado los datos'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->_setMessage(__(''),self::ERROR);
			}
		} else {
			$this->request->data = $this->Marca->read(null, $id);
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
		$this->Marca->id = $id;
		if (!$this->Marca->exists()) {
			throw new NotFoundException(__('Invalid marca'));
		}
		if ($this->Marca->delete()) {
			$this->_setMessage(__('Dato Borrado'));
			$this->redirect(array('action' => 'index'));
		}
		$this->_setMessage(__('No se pudo borrar el dato', self::ERROR));
		$this->redirect(array('action' => 'index'));
	}
}
