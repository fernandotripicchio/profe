<?php
 class Localidad extends AppModel {
      public $name = 'Localidad';
	  
      public $validate = array(
        'nombre' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Nombre es requerido'
            )),
        'codigo_postal' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Codigo Postal es requerido'
            )) ,
       );
  
 }