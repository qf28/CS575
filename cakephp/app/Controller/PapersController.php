<?php

class PapersController extends AppController {
    public $helpers = array('Html', 'Form','Session');
    public $components = array('Session');


    public function index() {
        $this->set('papers', $this->Paper->find('all'));
    }


    public function view($id) {
        if (!$id) {
            throw new NotFoundException(__('Invalid paper'));
        }

        $paper = $this->Paper->findById($id);
        if (!$paper) {
            throw new NotFoundException(__('Invalid paper'));
        }
        $this->set('paper', $paper);
    }

    public function add() {
        if ($this->request->is('paper')) {
            $this->Paper->create();
            if ($this->Paper->save($this->request->data)) {
                $this->Session->setFlash(__('Your paper has been saved.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Unable to add your paper.'));
        }
    }




public function edit($id = null) {
    if (!$id) {
        throw new NotFoundException(__('Invalid paper'));
    }

    $paper = $this->Paper->findById($id);
    if (!$paper) {
        throw new NotFoundException(__('Invalid paper'));
    }

    if ($this->request->is(array('paper', 'put'))) {
        $this->Paper->id = $id;
        if ($this->Paper->save($this->request->data)) {
            $this->Session->setFlash(__('Your paper has been updated.'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Unable to update your paper.'));
    }

    if (!$this->request->data) {
        $this->request->data = $paper;
    }
}








    public function delete($id) {
    if ($this->request->is('get')) {
        throw new MethodNotAllowedException();
    }

    if ($this->Paper->delete($id)) {
        $this->Session->setFlash(
            __('The paper with id: %s has been deleted.', h($id))
        );
        return $this->redirect(array('action' => 'index'));
    }
}
}