<?php

App::uses('AppController', 'Controller');

class HomeController extends AppController {

    public $uses = array('Assignment');

    public function isAuthorized($user) {

        if($this->action == 'select'){
            return true;
        }

        if($this->action == 'student' && $this->Auth->user('type') == 'student'){
            return true;
        }
        
        if($this->action == 'staff' && $this->Auth->user('type') == 'staff'){
            return true;
        }

        return parent::isAuthorized($user);
    }

    public function select() {
        if ($this->Auth->user('type') == 'staff') {
            $this->redirect(array('action' => 'staff'));
        } else {
            $this->redirect(array('action' => 'student'));
        }
    }

    public function staff() {
        $assignments = $this->Assignment->find('all', array('conditions' => array('section' => $this->Auth->user('section'))));
        $this->set('assignments', $assignments);
    }

    public function student() {
        $assignments = $this->Assignment->find('all', array('conditions' => array('section' => $this->Auth->user('section'))));
        $this->set('assignments', $assignments);
    }

}
