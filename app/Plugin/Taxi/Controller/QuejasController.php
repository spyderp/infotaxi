<?php
App::uses('AppController', 'Controller');
/**
 * Quejas Controller
 *
 * @property Queja $Queja
 */
class QuejasController extends TaxiAppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Queja->recursive = 0;
		$this->set('quejas', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Queja->id = $id;
		if (!$this->Queja->exists()) {
			throw new NotFoundException(__('Invalid queja'));
		}
		$this->set('queja', $this->Queja->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Queja->create();
			if ($this->Queja->save($this->request->data)) {
				$this->Session->setFlash(__('The queja has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The queja could not be saved. Please, try again.'));
			}
		}
		$taxis = $this->Queja->Taxi->find('list');
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
		$this->Queja->id = $id;
		if (!$this->Queja->exists()) {
			throw new NotFoundException(__('Invalid queja'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Queja->save($this->request->data)) {
				$this->Session->setFlash(__('The queja has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The queja could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Queja->read(null, $id);
		}
		$taxis = $this->Queja->Taxi->find('list');
		$this->set(compact('taxis'));
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
		$this->Queja->id = $id;
		if (!$this->Queja->exists()) {
			throw new NotFoundException(__('Invalid queja'));
		}
		if ($this->Queja->delete()) {
			$this->Session->setFlash(__('Queja deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Queja was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
