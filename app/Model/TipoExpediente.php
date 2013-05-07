<?php
 class TipoExpediente extends AppModel {
      public $name = 'TipoExpediente';
	  
      public $hasMany = array("Expedientes");
	   	  
      public $validate = array(
        'nombre' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Nombre es requerido'
            ))
       );
	   
	  
  
 }