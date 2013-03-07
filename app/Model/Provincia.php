<?php
 class Provincia extends AppModel {
      public $name = 'Provincia';
	  
      public $hasMany = array("Localidades" => array(
	                                 'foreignKey' => 'provincia'
	                            ),
	                           'Departamentos' => array(
	                                 'foreignKey' => 'provincia' 
							    )       
							 );	  
      public $validate = array(
        'nombre' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Nombre es requerido'
            ))
       );
  
 }