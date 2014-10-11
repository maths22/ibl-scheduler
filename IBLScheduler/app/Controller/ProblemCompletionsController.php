<?php

App::uses('AppController', 'Controller');

/**
 * ProblemCompletions Controller
 *
 * @property ProblemCompletion $ProblemCompletion
 * @property PaginatorComponent $Paginator
 */
class ProblemCompletionsController extends AppController {

    public function isAuthorized($user) {

        if ($this->action == 'submit_assignment' && $this->Auth->user('type') == 'student') {
            return true;
        }

        if ($this->action == 'assignment_report' && $this->Auth->user('type') == 'staff') {
            return true;
        }

        return parent::isAuthorized($user);
    }

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator', 'RequestHandler');
    public $uses = array('ProblemCompletion', 'Assignment');
    public $helpers = array('Time');

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->ProblemCompletion->recursive = 0;
        $this->set('problemCompletions', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->ProblemCompletion->exists($id)) {
            throw new NotFoundException(__('Invalid problem completion'));
        }
        $options = array('conditions' => array('ProblemCompletion.' . $this->ProblemCompletion->primaryKey => $id));
        $this->set('problemCompletion', $this->ProblemCompletion->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->ProblemCompletion->create();
            if ($this->ProblemCompletion->save($this->request->data)) {
                $this->Session->setFlash(__('The problem completion has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The problem completion could not be saved. Please, try again.'));
            }
        }
        $problems = $this->ProblemCompletion->Problem->find('list');
        $users = $this->ProblemCompletion->User->find('list');
        $this->set(compact('problems', 'users'));
    }


    public function assignment_report($id = null) {
        if (!$this->Assignment->exists($id)) {
            throw new NotFoundException(__('Invalid assignment'));
        }
        $this->Assignment->recursive = 1;
        $assignment = $this->Assignment->find('first', array('conditions' => array('id' => $id)));
        $counts = array();
        $total = 0;
        foreach ($assignment['Problem'] as $problem) {
            $total = $this->ProblemCompletion->find('count', array('conditions' => array('problem_id' => $problem['id'], 'assignment_id' => $problem['assignment_id'])));
            $this->ProblemCompletion->recursive = 1;
            $yeses = $this->ProblemCompletion->find('all', array('order'=>'RAND()', 'conditions' => array('readiness' => 'yes', 'problem_id' => $problem['id'], 'assignment_id' => $problem['assignment_id'])));
            $maybes = $this->ProblemCompletion->find('all', array('order'=>'RAND()', 'conditions' => array('readiness' => 'maybe', 'problem_id' => $problem['id'], 'assignment_id' => $problem['assignment_id'])));
            $noes = $this->ProblemCompletion->find('all', array('order'=>'RAND()', 'conditions' => array('readiness' => 'no', 'problem_id' => $problem['id'], 'assignment_id' => $problem['assignment_id'])));
            $yes_str = "";
            foreach ($yeses as $yes) {
                $yes_str .= $yes['User']['name'] . '; ';
            }
            $maybe_str = "";
            foreach ($maybes as $maybe) {
                $maybe_str .= $maybe['User']['name'] . '; ';
            }
            $no_str = "";
            foreach ($noes as $no) {
                $no_str .= $no['User']['name'] . '; ';
            }
            $out = array(array('id' => $problem['id'], 'name' => $problem['name'], 'yes' => $yes_str, 'maybe' => $maybe_str, 'no' => $no_str));
            $counts = array_merge($counts, $out);
        }
        $this->set(compact('counts', 'assignment'));
        $this->set('id', $id);
        $this->set('total', $total);
    }

    public function submit_assignment($id = null) {
        if (!$this->Assignment->exists($id)) {
            throw new NotFoundException(__('Invalid assignment'));
        }
        if ($this->request->is('post')) {
            $mine = $this->ProblemCompletion->find('all', array('conditions' => array('user_id' => $this->Auth->user('id'), 'assignment_id' => $id)));

            foreach ($mine as $response) {
                $this->ProblemCompletion->delete($response['ProblemCompletion']['id']);
            }
            foreach ($this->request->data['ProblemCompletion'] as $data_id => $response) {
                $this->ProblemCompletion->create();
                $data = array('ProblemCompletion' => array('user_id' => $this->Auth->user('id'), 'problem_id' => substr($data_id, 10), 'readiness' => $response));
                $this->ProblemCompletion->save($data);
            }
            
//            if ($this->ProblemCompletion->save($this->request->data)) {
            $this->Session->setFlash(__('Your readiness has been submitted.'));
            return $this->redirect(array('controller' => 'home', 'action' => 'select'));
//            } else {
//                $this->Session->setFlash(__('The problem completion could not be saved. Please, try again.'));
//            }
        }
        $problems = $this->Assignment->Problem->find('list', array('conditions' => array('assignment_id' => $id)));
        $this->Assignment->recursive = 0;
        $assignment = $this->Assignment->find('first', array('conditions' => array('id' => $id)));
        $this->set(compact('problems', 'assignment'));
        $mine = $this->ProblemCompletion->find('all', array('conditions' => array('user_id' => $this->Auth->user('id'), 'assignment_id' => $id)));

        foreach ($mine as $response) {
            $this->request->data['ProblemCompletion']['readiness_' . $response['Problem']['id']] = $response['ProblemCompletion']['readiness'];
        }
        $this->set('defaults', $this->request->data);
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->ProblemCompletion->exists($id)) {
            throw new NotFoundException(__('Invalid problem completion'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->ProblemCompletion->save($this->request->data)) {
                $this->Session->setFlash(__('The problem completion has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The problem completion could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('ProblemCompletion.' . $this->ProblemCompletion->primaryKey => $id));
            $this->request->data = $this->ProblemCompletion->find('first', $options);
        }
        $problems = $this->ProblemCompletion->Problem->find('list');
        $users = $this->ProblemCompletion->User->find('list');
        $this->set(compact('problems', 'users'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->ProblemCompletion->id = $id;
        if (!$this->ProblemCompletion->exists()) {
            throw new NotFoundException(__('Invalid problem completion'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->ProblemCompletion->delete()) {
            $this->Session->setFlash(__('The problem completion has been deleted.'));
        } else {
            $this->Session->setFlash(__('The problem completion could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}
