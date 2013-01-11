<?php
 class Departamento extends AppModel {
      public $name = 'Departamento';
	  
	  public $belongsTo = array("Provincia");	
	  public $hasMany = array("Localidades");
	    
      public $validate = array(
		        'nombre' => array(
		            'required' => array(
		                'rule' => array('notEmpty'),
		                'message' => 'Nombre es requerido'
		            ))

       );
  
 }