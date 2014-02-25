<?php
 class Dosep extends AppModel {
      public $name = 'Dosep';
	  public $primaryKey = 'numerodoc';
	  
	  
	  
	  public $belongsTo = array("Afiliado" => array(
	                                "className" => "Afiliado"
								    )
								);
								
								
             
	  
      public $validate = array(
        'nombre' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Nombre es requerido'
            )),
        'documento' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Documento es requerido'
            )) ,
       );
	   
	   
   ////////////////////////////////////////////////////////////////////////////////////////	   
   //Funcion para importar afiliados de dosep
   ////////////////////////////////////////////////////////////////////////////////////////
   function importar($filename)  {
   	
		// open the file
 		$handle = fopen($filename, "r");
 		// read the 1st row as headings
 		$header = fgetcsv($handle);

		// create a message container
		$return = array(
			'messages' => array(),
			'errors' => array(),
		);

        $nuevo_afiliado = array();
		
		
		$i = 0;
		$cantidad_afiliados = 0;
        while ( ($row = fgetcsv($handle) ) !== FALSE ) {			
        	if ( $i > -1 ) {        		
				$dosep = array();
				$dosep["numeroDoc"]       = $row[0];
				$dosep["Genero"]          = $row[1];
				$dosep["ApellidoNombre"]  = $row[2];
				$dosep["fechaNacimientoPers"] = $row[3];
				$dosep["tipoRelacion"]    = $row[4];
				$dosep["localidad"]       = $row[5];
				$dosep["Empleador"]       = $row[6];
				$dosep["Plan"]            = $row[7];
				echo "<br>";
				print_r( $row);
                echo "<br>";
				print_r( $dosep);
				echo "<br>";					  
				$this->create();
				$this->save( $dosep );
			}	
        	$cantidad_afiliados++;
		}
 		fclose($handle);

 		// return the messages
 		return $cantidad_afiliados;

	 
	 
	 
	}	  	
		   
  
 }