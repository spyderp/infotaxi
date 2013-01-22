<?php
App::uses('AppController', 'Controller');
/**
 * HistorialPagos Controller
 *
 * @property HistorialPago $HistorialPago
 */
class HistorialPagosController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->HistorialPago->recursive = 0;
		$this->set('historialPagos', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->HistorialPago->id = $id;
		if (!$this->HistorialPago->exists()) {
			throw new NotFoundException(__('Invalid historial pago'));
		}
		$this->set('historialPago', $this->HistorialPago->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->HistorialPago->create();
			if ($this->HistorialPago->save($this->request->data)) {
				$this->Session->setFlash(__('The historial pago has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The historial pago could not be saved. Please, try again.'));
			}
		}
		$taxis = $this->HistorialPago->Taxi->find('list');
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
		$this->HistorialPago->id = $id;
		if (!$this->HistorialPago->exists()) {
			throw new NotFoundException(__('Invalid historial pago'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->HistorialPago->save($this->request->data)) {
				$this->Session->setFlash(__('The historial pago has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The historial pago could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->HistorialPago->read(null, $id);
		}
		$taxis = $this->HistorialPago->Taxi->find('list');
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
		$this->HistorialPago->id = $id;
		if (!$this->HistorialPago->exists()) {
			throw new NotFoundException(__('Invalid historial pago'));
		}
		if ($this->HistorialPago->delete()) {
			$this->Session->setFlash(__('Historial pago deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Historial pago was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
