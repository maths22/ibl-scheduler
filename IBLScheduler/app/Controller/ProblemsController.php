<?php
App::uses('AppController', 'Controller');
/**
 * Problems Controller
 *
 * @property Problem $Problem
 * @property PaginatorComponent $Paginator
 */
class ProblemsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Problem->recursive = 0;
		$this->set('problems', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Problem->exists($id)) {
			throw new NotFoundException(__('Invalid problem'));
		}
		$options = array('conditions' => array('Problem.' . $this->Problem->primaryKey => $id));
		$this->set('problem', $this->Problem->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Problem->create();
			if ($this->Problem->save($this->request->data)) {
				$this->Session->setFlash(__('The problem has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The problem could not be saved. Please, try again.'));
			}
		}
		$assignments = $this->Problem->Assignment->find('list');
		$this->set(compact('assignments'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Problem->exists($id)) {
			throw new NotFoundException(__('Invalid problem'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Problem->save($this->request->data)) {
				$this->Session->setFlash(__('The problem has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The problem could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Problem.' . $this->Problem->primaryKey => $id));
			$this->request->data = $this->Problem->find('first', $options);
		}
		$assignments = $this->Problem->Assignment->find('list');
		$this->set(compact('assignments'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Problem->id = $id;
		if (!$this->Problem->exists()) {
			throw new NotFoundException(__('Invalid problem'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Problem->delete()) {
			$this->Session->setFlash(__('The problem has been deleted.'));
		} else {
			$this->Session->setFlash(__('The problem could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
