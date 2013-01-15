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
  
  
	 public function findDepartamento($departamento_id, $provincia_id = 19){
              $departamento =  $this->find("first", array("conditions" => 
			                                              array("provincia_id" => $provincia_id,
																"departamento_id" => $departamento_id), 
			                                               "recursive" => -1) );
		      return $departamento; 
														   	 	
	 	
	 }  
 }