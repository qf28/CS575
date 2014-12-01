<?php

class Paper extends AppModel {

	    public $validate = array(
        'title' => array(
            'rule' => 'notEmpty'
        ),
        'file' => array(
            'rule' => 'notEmpty'
        )
    );
}