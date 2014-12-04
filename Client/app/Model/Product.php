<?php

class Product extends AppModel {

	public $validate = array(
        'title' => array(
            'rule' => 'notEmpty'
        ),
        'link' => array(
            'rule' => 'notEmpty'
        ),
        'email' => array(
            'rule' => 'notEmpty'
        ),
        'initial' => array(
            'rule' => 'notEmpty'
        ),
        'target' => array(
            'rule' => 'notEmpty'
        )
    );
}