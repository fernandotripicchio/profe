<?php
 class Prestacion extends AppModel {
      public $name = 'Prestacion';
      public $hasMany = array("Prestadores" => array(
	                                 'foreignKey' => 'prestacion_id'
	                            )       
							 );	  	  
      public $validate = array(
        'nombre' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Nombre es requerido'
            )),
            
       );
  
 }