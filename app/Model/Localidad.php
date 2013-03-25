<?php                          
 class Localidad extends AppModel {
      public $name = 'Localidad';
	  

      public $belongsTo = array('Departamento' => array(
			                         'className' => 'Departamento',
			                         'foreignKey' => 'departamento',
		                             ),
		                          'Provincia' => array(
		                             'className' => 'Provincia',
		                             'foreignKey' => 'provincia',
								  )   
							    );								
      public $hasMany = array("Afiliados");
	   	  
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
			                                              array("localidad " => $localidad_id,
														        "provincia" => $provincia_id,
																"departamento" => $departamento_id), 
			                                               "recursive" => -1) );
		      return $localidad; 
														   	 	
	 	
	 }
	 
	public function getLocalidadesLocation($provincia_id = 19, $departamento_id = false ){
	    $localidades = array();
		
		if (!empty($departamento_id)) {
	        $condition = "Localidad.provincia = $provincia_id";			
			//Busco el departamento			
		    $departamento = $this->Departamento->find("first", 
			                                          array("conditions" => array("id" => $departamento_id),
			  	 									        "recursive" => -1));
	
	         
		    if (!empty($departamento)) {
	           $condition .= " and Localidad.departamento =  " . $departamento["Departamento"]["departamento"];
		    }			 
			$localidades = $this->find("all",array("conditions" => $condition,
			                                       "sort" => "Localidad.nombre ASC",
			                                       "recursive" => -1));
			                                       														
		} // Of departamento
	    return $localidades;	
	 }
	 
	 
	 
	 

  
 }