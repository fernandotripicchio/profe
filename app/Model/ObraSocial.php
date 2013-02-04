<?php
 class ObraSocial extends AppModel {
      public $name = 'ObraSocial';
	  
      public $validate = array(
        'nombre' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Nombre es requerido'
            )),
        'codigo' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Codigo es requerido'
            )) ,
       );
  
 }