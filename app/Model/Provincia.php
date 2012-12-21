<?php
 class Provincia extends AppModel {
      public $name = 'Provincia';
	  
      public $validate = array(
        'nombre' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Nombre es requerido'
            ))
       );
  
 }