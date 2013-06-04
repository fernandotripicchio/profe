<?php
 class Centro extends AppModel {
      public $name = 'Centro';
	  
	  public $belongsTo = array("Localidad");
	  public $hasMany = array("Afiliados"); 
	  
     public $hasAndBelongsToMany = array('Medico'=>array('className'=>'Medico'));
	  
      public $validate = array(
        'nombre' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Nombre es requerido'
            ))    
       );
	   
	   
	   
	public function findCentros($departamento_id, $provincia_id = 19){
     $centros =  $this->find("all", array("conditions" => 
			                               array("provincia" => $provincia_id,
					  	 					     "departamento" => $departamento_id), 
			                                     "recursive" => -1) );
	 return $centros;	 	
	}	   
	
	
	//Geolocation centros
    public function getCentrosLocation($provincia_id = 19, $departamento = false, $localidad =  false) {
		$condition = "Localidad.provincia = $provincia_id";	
		if ( empty($departamento) && empty($localidad) ) {
      	    $centros = $this->find("all", array("conditions" => $condition, "sort" => "Centro.nombre ASC"));			
		} else {
			$conditions = "Departamento.id = $departamento ";
			if (!empty($localidad)) {
			   $conditions .= " and Localidad.id = $localidad ";	
			}
            $centros = $this->find("all", array('joins' => array(
                                                         array('table' =>'localidades', 
                                                                         'alias' => "Localidad",
                                                                         'foreignKey' => false,
                                                                         'conditions'=> array('Localidad.id = Centro.localidad_id')
								 						       ),
                                                              array('table' =>'departamentos', 
                                                                        'alias' => "Departamento",
                                                                        'foreignKey' => false,
                                                                         'conditions'=> array('Localidad.departamento = Departamento.departamento')
																    )
										             ),
                                                     "conditions" => $conditions,
                                                     "order" => "Centro.nombre ASC",
				                                     "recursive" => -1));
		}
		//Le doy formato al centro
        return $centros;
   } 
	
	
   ////////////////////////////////////////////////////////////////////////////////////////	   
   //Funcion para importar usuarios desde un archivo CSV y generar un nuevo listado  
   ////////////////////////////////////////////////////////////////////////////////////////
   function importar_temporal($filename)  {
		// open the file
 		$handle = fopen($filename, "r");
 		// read the 1st row as headings
 		$header = fgetcsv($handle);

		// create a message container
		$return = array(
			'messages' => array(),
			'errors' => array(),
		);

        $nuevo_centro = array();
		
		
		$i = 0;
		$cantidad_centros = 0;
        while (($row = fgetcsv($handle)) !== FALSE) {
			
        	if ( $i > -1 ) {
        		
			//strtoupper(“Texto minúsculas”);
			$afiliado_documento  = strtoupper( $row[5] );
			}	
        $i++;
		}
 		fclose($handle);

 		// return the messages
 		return $cantidad_centros;

	}	  	
	
	
   ////////////////////////////////////////////////////////////////////////////////////////	   
   //Funcion para importar usuarios desde un archivo CSV y generar un nuevo listado  
   ////////////////////////////////////////////////////////////////////////////////////////
   function import($filename)  {
		// open the file
 		$handle = fopen($filename, "r");
 		// read the 1st row as headings
 		$header = fgetcsv($handle);

		// create a message container
		$return = array(
			'messages' => array(),
			'errors' => array(),
		);

        $nuevo_centro = array();		
		
		$i = 0;
		$cantidad_centros = 0;
        while (($row = fgetcsv($handle)) !== FALSE) {
			
        	if ( $i > -1 ) {
        		
			//strtoupper(“Texto minúsculas”);
			$afiliado_clave      = strtoupper( $row[2] );
			$afiliado_documento  = strtoupper( $row[10] );
			
			//Centro
			$centro_nombre     = strtoupper( $row[25] );
            $centro_medico     = strtoupper( $row[26] );			
			$centro_localidad  = strtoupper( $row[28] );
			
		    
			$localidad = $this->Localidad->find("first" , array("conditions" => array("Localidad.nombre" =>  $centro_localidad, "Localidad.provincia" => 19), "recursive" => 0));
            			
			 if (sizeof($localidad) > 0) {
					 $nuevo_centro["nombre"]       = $centro_nombre;
					 $nuevo_centro["localidad_id"] = $localidad["Localidad"]["id"];
					// //Me fijo si ya existe, si existe hago el update si no hago el create
					$centro = $this->find("first",  array("conditions" => array("nombre" => $centro_nombre ), "recursive" => -1));
					 if (empty($centro)) {
						 $this->create();
						 $this->save($nuevo_centro);
						 $cantidad_centros++;
						 $centro_id = $this->id;
					 } else {
					 	 $centro_id = $centro["Centro"]["id"];
						 $this->id  = $centro["Centro"]["id"];
						 $this->save($nuevo_centro);
						 $this->id = -1;
						 $cantidad_centros++;
					 }
					 //Afiliado
					  
					  $afiliado = $this->query("SELECT afiliados.id FROM afiliados WHERE afiliados.documento = '" . $afiliado_documento . "' limit 1");
					  $afiliados_id = "";
					  print_r($afiliado);
					  if (!empty($afiliado) && !empty($afiliado[0])) {
					  	    $afiliado_id = $afiliado[0]["afiliados"]["id"];
                            $this->query("UPDATE afiliados set centro_id = " . $centro_id . "  where afiliados.id = ".$afiliado_id);
					  }
			}
            
		 }
        $i++;
		}
 		fclose($handle);

 		// return the messages
 		return $cantidad_centros;

	}	   
  
 }