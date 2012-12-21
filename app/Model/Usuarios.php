<?php
 class Usuario extends AppModel {
      public $name = 'Usuario';
	  
      public $validate = array(
        'nombre' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Nombre es requerido'
            ),
        'login' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Login es requerido'
            )
            
		),
		
       );
  
 }