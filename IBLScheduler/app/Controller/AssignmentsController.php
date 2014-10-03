<?php

App::uses('AppController', 'Controller');

/**
 * Assignments Controller
 *
 * @property Assignment $Assignment
 * @property PaginatorComponent $Paginator
 */
class AssignmentsController extends AppController {

    public function isAuthorized($user) {

        if ($this->action == 'add' && $this->Auth->user('type') == 'staff') {
            return true;
        }

        if ($this->action == 'edit' && $this->Auth->user('type') == 'staff') {
            return true;
        }

        return parent::isAuthorized($user);
    }
    
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
        $this->Assignment->recursive = 0;
        $this->set('assignments', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Assignment->exists($id)) {
            throw new NotFoundException(__('Invalid assignment'));
        }
        $options = array('conditions' => array('Assignment.' . $this->Assignment->primaryKey => $id));
        $this->set('assignment', $this->Assignment->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Assignment->create();
            $this->request->data['Assignment']['section'] = $this->Auth->user('section');
            if ($this->Assignment->save($this->request->data)) {
                foreach (explode(';', $this->request->data['Assignment']['problems']) as $name) {
                    $this->Assignment->Problem->create();
                    $problem = array('Problem' => array('assignment_id' => $this->Assignment->id, 'name' => trim($name)));
                    $this->Assignment->Problem->save($problem);
                }
                $this->Session->setFlash(__('The assignment has been saved.'));
                return $this->redirect(array('controller'=>'home','action' => 'select'));
            } else {
                $this->Session->setFlash(__('The assignment could not be saved. Please, try again.'));
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
        if (!$this->Assignment->exists($id)) {
            throw new NotFoundException(__('Invalid assignment'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Assignment->save($this->request->data)) {
                $this->Session->setFlash(__('The assignment has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The assignment could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Assignment.' . $this->Assignment->primaryKey => $id));
            $this->request->data = $this->Assignment->find('first', $options);
        }
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->Assignment->id = $id;
        if (!$this->Assignment->exists()) {
            throw new NotFoundException(__('Invalid assignment'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Assignment->delete()) {
            $this->request->data = $this->Assignment->find('first', $options);
            $this->Session->setFlash(__('The assignment has been deleted.'));
        } else {
            $this->Session->setFlash(__('The assignment could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}
