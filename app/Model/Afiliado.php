<?php
 
 class Afiliado extends AppModel {
      public $name = 'Afiliado';
	  
	  public $belongsTo = array('Grupo',	
	                            'Centro',                             
	                            'Localidad' => array(
                                   'className'  => 'Localidad',
                                   'foreignKey' => 'localidad_id'
                                 ) ,
	                            'Departamento' => array(
                                   'className'  => 'Departamento',
                                   'foreignKey' => 'departamento'
                                 ) ,
	                            'Provincia' => array(
                                   'className'  => 'Provincia',
                                   'foreignKey' => 'provincia'
                                 ) ,
	                            'Medico' => array(
                                   'className'  => 'Medico',
                                   'foreignKey' => 'medico_id'
                                 )                                 
                                 
	                            );
	  #Un Afiliado tiene un centro en el carnet
	  #Pero a su vez guardo la relacion entre centro y 
	  public $hasMany = array("AfiliadoCentroMedico");
	  
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
	 function import($filename, $activo =  1)  {
 		$handle = fopen($filename, "r");
 		$header = fgetcsv($handle);
		$return = array(
			'messages' => array(),
			'errors' => array(),
		);
        $nuevo_afiliado = array();
		$i = 0;
		$cantidad_afiliados = $no_insertados = 0;
        while (($row = fgetcsv($handle)) !== FALSE) {
        	if ( 1 ) {
			//Grupo
			$codigo = $row[5];
			$grupo = $this->Grupo->find("first" , array("conditions" => array("codigo" =>  $codigo), "recursive" => -1));
            //Localidad
            $provincia_id    = $row[19];
			$departamento_id = $row[20];
			$localidad_id    = $row[21];
			$localidad    = $this->Localidad->findLocalidad($localidad_id, $departamento_id, $provincia_id);
			$departamento = $this->Departamento->findDepartamento($departamento_id, $provincia_id);
			$provincia    = 19; #$this->Provincia->findProvincia($provincia_id);
			if (sizeof($grupo) > 0 && sizeof($localidad) > 0) {
				    $nuevo_afiliado = $this->construirAfiliado($row);
				    $clave_numero = $nuevo_afiliado["clave_numero"];
					$nuevo_afiliado["activo"] = $activo;
       		        $nuevo_afiliado["localidad_id"]    = $localidad["Localidad"]["id"];
		            $nuevo_afiliado["localidad"]       = $localidad_id;
		            $nuevo_afiliado["departamento"]    = $departamento["Departamento"]["id"];
		            $nuevo_afiliado["provincia"]       = $provincia;	
		            $nuevo_afiliado["grupo_id"]       = $grupo["Grupo"]["id"];									
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
			
			} else {
				$no_insertados++;
			}
			
			}
            $i++;
		
		}
 		// close the file
 		fclose($handle);
 		// return the messages
 		return $cantidad_afiliados;
	}

    function construirAfiliado($row){
    	 $nuevo_afiliado = array();
		 $nuevo_afiliado["clave_numero"] = $row[2];
		 $nuevo_afiliado["tipo_documento"] = strtoupper( $row[9] );
		 $nuevo_afiliado["documento"]      = strtoupper( $row[10] );
		 $nuevo_afiliado["nombre"] = strtoupper( $row[6] ); 
		 $nuevo_afiliado["sexo"]   = strtoupper( $row[7] ); 
		 $nuevo_afiliado["estado_civil"]   = strtoupper( $row[8] );

		 //Localidad
		 $nuevo_afiliado["domicilio_calle"] = strtoupper( $row[14] );
		 $nuevo_afiliado["domicilio_nro"]   = strtoupper( $row[15] );
		 $nuevo_afiliado["domicilio_piso"]  = strtoupper( $row[16] );					
		 $nuevo_afiliado["domicilio_depto"] = strtoupper( $row[17] );
		 $nuevo_afiliado["codigo_postal"]   = strtoupper( $row[18] );
		 //Fecha de Nacimiento
		 //Agregar para formatear fecha
		 $nuevo_afiliado["fecha_nacimiento"] = $this->date_format($row[11]);
		 //Fecha Alta
		 $nuevo_afiliado["fecha_alta"]   = $this->date_format($row[13]);
		 $nuevo_afiliado["incapacidad"] = $row[12];
		 return $nuevo_afiliado;
    	
    }
	
 }