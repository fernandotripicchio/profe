<?php
 class Centro extends AppModel {
      public $name = 'Centro';
	  
	  public $belongsTo = array("Localidad");
	  public $hasMany = array("Afiliados"); 
	  
      public $validate = array(
        'nombre' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Nombre es requerido'
            )),
        'telefonos' => array(
		    'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Nombre es requerido'
		       
			))    
       );
	   
	   
	 //Funcion para importar usuarios desde un archivo CSV y generar un nuevo listado  
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
        	if ( $i > 0 ) {
        		
			//strtoupper(“Texto minúsculas”);
			$afiliado_clave      = strtoupper( $row[2] );
			$afiliado_documento  = strtoupper( $row[10] );
			
			//Centro
			$centro_nombre     = strtoupper( $row[25] );
			$centro_localidad  = strtoupper( $row[27] );
			$centro_medico     = strtoupper( $row[26] );
			$voz_ip      = strtoupper( $row[5] );
		
		
		    
			$localidad = $this->Localidad->find("first" , array("conditions" => array("Localidad.nombre" =>  $ciudad, "Localidad.provincia" => 19), "recursive" => 0));
            			
			// if (sizeof($localidad) > 0) {
// 				    
// 		            
					// $nuevo_centro["nombre"]       = $nombre;
					// $nuevo_centro["direccion"]    = $direccion;
					// $nuevo_centro["localidad_id"] = $localidad["Localidad"]["id"]; 
					// $nuevo_centro["telefonos"]    = $telefonos; 
					// $nuevo_centro["voz_ip"]       = $voz_ip;
// 									
// 					
					// //Me fijo si ya existe, si existe hago el update si no hago el create
					// $centro = $this->find("first",  array("conditions" => array("nombre" => $nombre ), "recursive" => -1));
// 					
					// if (empty($centro)) {
						// $this->create();
						// $this->save($nuevo_centro);
						// $cantidad_centros++;
					// } else {
						// $this->id = $centro["Centro"]["id"];
						// $this->save($nuevo_centro);
						// $this->id = -1;
						// $cantidad_centros++;
					// }
// 			
			// }
			
			}
            $i++;
		
		}
		

 		// close the file
		
 		fclose($handle);

 		// return the messages
 		return $cantidad_centros;

	}	   
  
 }