<?php
 class Afiliado extends AppModel {
      public $name = 'Afiliado';
	  
	  public $belongsTo = array('Grupo',	                             
	                            'Localidad' => array(
                                   'className'  => 'Localidad',
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
        'tipo' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Tipo Documento es requerido'
            )),
        'sexo' => array(
             'required' => array(
                 'rule' => array('notEmpty'),
                 'message' => 'Sexo es requerido'
			  )
		 ),     
        'clave' => array(
             'required' => array(
                 'rule' => array('notEmpty'),
                 'message' => 'Clave es requerida'
			  )
		 )

       );
	   
	   
	   
 
	 //Funcion para importar usuarios desde un archivo CSV y generar un nuevo listado  
	 function import($filename)  {
 		// to avoid having to tweak the contents of
 		// $data you should use your db field name as the heading name
		// eg: Post.id, Post.title, Post.description

		// open the file
 		$handle = fopen($filename, "r");

        //$fileData = fread(fopen($filename, "r"),$filesize); 		
 		
 		
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
        while (($row = fgetcsv($handle)) !== FALSE) {
        	if ( 1 ) {
        		
			//Grupo
			$codigo = $row[5];
			$grupo = $this->Grupo->find("first" , array("conditions" => array("codigo" =>  $codigo), "recursive" => -1));
            //Localidad
            $provincia_id    = $row[19];
			$departamento_id = $row[20];
			$localidad_id    = $row[21];
			$localidad = $this->Localidad->findLocalidad($localidad_id, $departamento_id, $provincia_id = 19);
            			
						
			if (sizeof($grupo) > 0 && sizeof($localidad) > 0) {
				    
		            $clave_numero = $nuevo_afiliado["clave_numero"] = $row[2];
					$nuevo_afiliado["tipo_documento"] = $row[9];
					$nuevo_afiliado["documento"] = $row[10];
					$nuevo_afiliado["nombre"] = $row[6]; 
					$nuevo_afiliado["sexo"]   = $row[7]; 
					$nuevo_afiliado["estado_civil"]   = $row[8];
									
					
					$nuevo_afiliado["grupo_id"]   = $grupo["Grupo"]["id"];
					//Localidad
					$nuevo_afiliado["localidad_id"]    = $localidad["Localidad"]["id"];
					$nuevo_afiliado["domicilio_calle"] = $row[14];
					$nuevo_afiliado["domicilio_nro"]   = $row[15];
					$nuevo_afiliado["domicilio_piso"]  = $row[16];					
					$nuevo_afiliado["domicilio_depto"] = $row[17];
					$nuevo_afiliado["codigo_postal"]   = $row[18];
					
										
					
					//Fecha de Nacimiento
					$nuevo_afiliado["fecha_nacimiento"] = $this->date_format($row[11]);
					
					//Fecha Alta
					$nuevo_afiliado["fecha_alta"]   = $this->date_format($row[13]);
					$nuevo_afiliado["incapacidad"] = $row[12];
					
					//Me fijo si ya existe, si existe hago el update si no hago el create
					$afiliado = $this->find("first",  array("conditions" => array("clave_numero" => $clave_numero ), "recursive" => -1));
					
					
					if (empty($afiliado)) {
						$this->create();
						$this->save($nuevo_afiliado);
						$cantidad_afiliados++;
					} else {
						$this->id = $afiliado["Afiliado"]["id"];
						$this->save($nuevo_afiliado);
						$this->id = -1;
						$cantidad_afiliados++;
					}
			
			}
			
			}
            $i++;
		
		}
		

 		// close the file
		
 		fclose($handle);

 		// return the messages
 		return $cantidad_afiliados;

	}
	
 }