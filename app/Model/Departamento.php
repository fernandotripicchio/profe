<?php
 class Departamento extends AppModel {
      public $name = 'Departamento';
	  
	  public $belongsTo = array("Provincia");	
	    
      public $validate = array(
		        'nombre' => array(
		            'required' => array(
		                'rule' => array('notEmpty'),
		                'message' => 'Nombre es requerido'
		            ))

       );
  
 }