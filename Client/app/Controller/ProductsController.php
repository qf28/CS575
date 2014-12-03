<?php

class ProductsController extends AppController {


    public $helpers = array('Html', 'Form','Session');
    public $components = array('Session');
    // public $components = array('RequestHandler');


    public function filter($cd) {

        $posts = $this->Post->find('all', array(
            'conditions'=>array('Product.initial'=> $cd)
        ));


        $this->set('products', $products);
        return $this->redirect(array('action' => 'index'));

    }


    public function index() {

        $this->set('products', $this->Product->find('all'));
        $this->paginate = array(
            'order' => array('id' => 'desc')
        );
     

        $products = $this->paginate('Product');
        $this->set('products',$products);
    
    }


    public function view($id) {
        if (!$id) {
            throw new NotFoundException(__('Invalid product'));
        }

        $product = $this->Product->findById($id);
        if (!$product) {
            throw new NotFoundException(__('Invalid product'));
        }
        // $this->set('product', $product);
        $this->redirect($product['Product']['link']);
    }

    public function add() {

        if ($this->request->is('post')) {
                    if(isset( $this->params['post']['Cancel'])){
            return $this->redirect(array('action' => 'index'));
        }
        $this->Product->create();
        
            if ($this->Product->save($this->request->data)) {
                $this->Session->setFlash(__('Your watch item has been saved.'));
                return $this->redirect(array('action' => 'index'));
            }

            $this->Session->setFlash(__('Unable to add your item.'));
        }
    }




    public function edit($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid product'));
        }

        $product = $this->Product->findById($id);
        if (!$product) {
            throw new NotFoundException(__('Invalid product'));
        }

        if ($this->request->is(array('product', 'put'))) {
            $this->Product->id = $id;
            if ($this->Product->save($this->request->data)) {
                $this->Session->setFlash(__('Your product has been updated.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Unable to update your product.'));
        }

        if (!$this->request->data) {
            $this->request->data = $product;
        }
    }




    public function delete($id) {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }

        if ($this->Product->delete($id)) {
            $this->Session->setFlash(
                __('The product with id: %s has been deleted.', h($id))
            );
            return $this->redirect(array('action' => 'index'));
        }
    }


}