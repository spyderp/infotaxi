<?php
App::uses('AppController', 'Controller');
/**
 * Estados Controller
 *
 * @property Estado $Estado
 */
class EstadosController extends TaxiAppController {
	public $helpers = array('Qrcode.Qrcode');
	/**
 	* index method
 	*
 	* @return void
 	*/
	public function index() {
		$this->Estado->recursive = 0;
		$this->set('estados', $this->paginate());
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Estado->create();
			if ($this->Estado->save($this->request->data)) {
				$this->_setMessage(__('Se ha agregado el nuevo estado'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->_setMessage(__('No se pudo guardar el núevo estado. Intente nuevamente'), self::ERROR);
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
		$this->Estado->id = $id;
		if (!$this->Estado->exists()) {
			throw new NotFoundException(__('Invalid estado'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Estado->save($this->request->data)) {
				$this->_setMessage(__('Se ha actualizado el estado'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->_setMessage(__('No se pudo actualizar los datos. Intente nuevamene'), self::ERROR);
			}
		} else {
			$this->request->data = $this->Estado->read(null, $id);
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
		$this->Estado->id = $id;
		if (!$this->Estado->exists()) {
			throw new NotFoundException(__('Invalid estado'));
		}
		if ($this->Estado->delete()) {
			$this->_setMessage(__('Estado Borrado'));
			$this->redirect(array('action' => 'index'));
		}
		$this->_setMessage(__('No se puede borrar el estado'), self::ERROR);
		$this->redirect(array('action' => 'index'));
	}
}
