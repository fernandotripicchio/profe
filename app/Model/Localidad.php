<?php
 class Localidad extends AppModel {
      public $name = 'Localidad';
	  
	  public $belongsTo = array('Departamento'=> array(
	                                             'conditions' => array('Departamento.provincia_id' => '19' ) 
							    	            ), 
	                            'Provincia' 
								);
	  
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
  
     
	 public function findLocalidad($localidad_id, $departamento_id, $provincia_id = 19){
              $localidad =  $this->find("first", array("conditions" => 
			                                              array("localidad_id " => $localidad_id,
														        "provincia_id" => $provincia_id,
																"departamento_id" => $departamento_id), 
			                                               "recursive" => -1) );
		      return $localidad; 
														   	 	
	 	
	 }
	 
	 

  
 }