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
                                   'foreignKey' => 'departamento_id'
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
	  public $hasMany = array("AfiliadoCentroMedico", "Prestaciones", "Clinicas", "Expedientes");
	  
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
	   
	   
	 // Metodo para dar de bajas afiliados, lo que hace es setear el campo en no activo y poner el motivo de 
	 // de la baja  
	 function bajas($filename, $activo =  1)  {
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
			$baja_afiliado = $this->construirBajaAfiliado($row);
            $afiliado = $this->find("first",  array("conditions" => array("documento" => $baja_afiliado["documento"] ), "recursive" => -1));
			if (empty($afiliado)) {
			    //$baja_afiliado["id"] = $afiliado["Afiliado"]["id"];
			    $baja_afiliado["activo"] = false;				
				$this->create();
				if ( $this->save($baja_afiliado) ) 
				                 $cantidad_afiliados++;
			 } else {
			 	$baja_afiliado["id"] = $afiliado["Afiliado"]["id"];
			 	$this->save($baja_afiliado);
				$cantidad_afiliados++;				
			 }
		}
 		// close the file
 		fclose($handle);
 		// return the messages
 		return $cantidad_afiliados;
	}
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
		
		$no_localidad = $this->Localidad->find("first", array("conditions" => array("nombre" => "NO TIENE LOCALIDAD"), "recursive" => -1));
		$no_departamento = $this->Departamento->find("first", array("conditions" => array("nombre" => "NO TIENE DEPARTAMENTO"), "recursive" => -1));
		
        while (($row = fgetcsv($handle)) !== FALSE) {
        	$codigo = "";
			$loca = "";
			$depto = "";
			//Grupo
			$codigo = $row[5];
			$grupo = $this->Grupo->find("first" , array("conditions" => array("codigo" =>  $codigo), "recursive" => -1));
            //Localidad
            $provincia    = $row[19];
			$departamento = $row[20];
			$localidad    = $row[21];
			
			$loca        = $this->Localidad->findLocalidad($localidad, $departamento, $provincia);
			$depto       = $this->Departamento->findDepartamento($departamento, $provincia); 
 	        $nuevo_afiliado = $this->construirAfiliado($row);
			$clave_numero = $nuevo_afiliado["clave_numero"];
			$documento    = $nuevo_afiliado["documento"];
			$nuevo_afiliado["activo"] = $activo;
					
		    if (!empty( $loca )) {
			    $nuevo_afiliado["localidad_id"]    = $loca["Localidad"]["id"];	
			} else {
				$nuevo_afiliado["localidad_id"]    = $no_localidad["Localidad"]["id"];
			}
					
			if (!empty( $depto )) {
			    $nuevo_afiliado["departamento_id"]    = $depto["Departamento"]["id"];	
			} else {
				$nuevo_afiliado["departamento_id"]    = $no_departamento["Departamento"]["id"];
			}					
					
       		//Datos basicos del excel
		    $nuevo_afiliado["localidad"]       = $localidad;
		    $nuevo_afiliado["departamento"]    = $departamento;
		    $nuevo_afiliado["provincia"]       = $provincia;

		    if ( !empty($grupo)) {
					    $nuevo_afiliado["grupo_id"]       = $grupo["Grupo"]["id"];	
			}
					
			//Me fijo si ya existe, si existe hago el update si no hago el create
			$afiliado = $this->find("first",  array("conditions" => array("documento" => $documento ), "recursive" => -1));
			
			if (empty($afiliado)) {
				$this->create();
			    if ( $this->save($nuevo_afiliado) ) {
						$cantidad_afiliados++;
			    } 
			} else {
			    	print_r($nuevo_afiliado);
					echo "<br>";
			}	
		}
 		// close the file
 		fclose($handle);
 		// return the messages
 		return $cantidad_afiliados;
	}

    function construirBajaAfiliado($row){
    	 $baja_afiliado = array();
		 $baja_afiliado["clave_excaja"]  = $row[0];
		 $baja_afiliado["clave_tipo"]    = $row[1];		 
		 $baja_afiliado["clave_numero"]  = $row[2];
		 $baja_afiliado["clave_coparticipe"] = $row[3];
		 $baja_afiliado["clave_parentezco"]  = $row[4];
		 $baja_afiliado["ley_aplicada"]     = $row[5];
		 $baja_afiliado["nombre"]           = strtoupper( $row[6] ); 
		 $baja_afiliado["sexo"]             = strtoupper( $row[7] ); 
		 $baja_afiliado["tipo_documento"]   = strtoupper( $row[8] );
		 $baja_afiliado["documento"]        = strtoupper( $row[9] );
         $baja_afiliado["fecha_nacimiento"] = $this->date_format($row[10]);
		 $baja_afiliado["fecha_alta"]       = $this->date_format($row[11]);	
		 $baja_afiliado["fecha_baja"]       = $this->date_format($row[12]);	 
		 $baja_afiliado["motivo_baja"]      = $row[13] ;
		  return $baja_afiliado;    	
    }


    function construirAfiliado($row){
    	 $nuevo_afiliado = array();
		 $nuevo_afiliado["clave_excaja"]  = $row[0];
		 $nuevo_afiliado["clave_tipo"]    = $row[1];		 
		 $nuevo_afiliado["clave_numero"]  = $row[2];
		 $nuevo_afiliado["clave_coparticipe"] = $row[3];
		 $nuevo_afiliado["clave_parentezco"]  = $row[4];
		 $nuevo_afiliado["ley_aplicada"] = $row[5];
		 $nuevo_afiliado["nombre"] = strtoupper( $row[6] ); 
		 $nuevo_afiliado["sexo"]   = strtoupper( $row[7] ); 
		 $nuevo_afiliado["estado_civil"]   = strtoupper( $row[8] );
		 $nuevo_afiliado["tipo_documento"] = strtoupper( $row[9] );
		 $nuevo_afiliado["documento"]      = strtoupper( $row[10] );
         $nuevo_afiliado["fecha_alta"] = $this->date_format($row[11]);		 
         $nuevo_afiliado["incapacidad"]  = $row[12];
		 $nuevo_afiliado["fecha_alta"]   = $this->date_format($row[13]);
		 //Localidad
		 $nuevo_afiliado["domicilio_calle"] = strtoupper( $row[14] );
		 $nuevo_afiliado["domicilio_nro"]   = strtoupper( $row[15] );
		 $nuevo_afiliado["domicilio_piso"]  = strtoupper( $row[16] );					
		 $nuevo_afiliado["domicilio_depto"] = strtoupper( $row[17] );
		 $nuevo_afiliado["codigo_postal"]   = strtoupper( $row[18] );
		 //Fecha de Nacimiento
		 return $nuevo_afiliado;    	
    }
    
	
	function nro_pension( $afiliado ) {
		$nro_pension = $afiliado["Afiliado"]["clave_excaja"]."-".$afiliado["Afiliado"]["clave_tipo"] ."-".$afiliado["Afiliado"]["clave_numero"];
		$nro_pension.= "-".$afiliado["Afiliado"]["clave_coparticipe"]."-".$afiliado["Afiliado"]["clave_parentezco"];
		return $nro_pension;
	}
	
 }