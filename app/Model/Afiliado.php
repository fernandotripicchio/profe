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
		
		$no_localidad = $this->Localidad->find("first", array("conditions" => array("nombre" => "NO TIENE LOCALIDAD"), "recursive" => -1));
		$no_departamento = $this->Departamento->find("first", array("conditions" => array("nombre" => "NO TIENE DEPARTAMENTO"), "recursive" => -1));
		
        while (($row = fgetcsv($handle)) !== FALSE) {
        	$codigo = "";
			

			//Grupo
			$codigo = $row[5];
			$grupo = $this->Grupo->find("first" , array("conditions" => array("codigo" =>  $codigo), "recursive" => -1));
            //Localidad
            $provincia    = $row[19];
			$departamento = $row[20];
			$localidad    = $row[21];
			$loca        = $this->Localidad->findLocalidad($localidad, $departamento, $provincia);
			$depto       = $this->Departamento->findDepartamento($departamento, $provincia); 
			// $nuevo_afiliado = $this->construirAfiliado($row);
		    // $this->create();
			// $this->save($nuevo_afiliado);			
			
			//if (sizeof($loca) > 0) {
				    $nuevo_afiliado = $this->construirAfiliado($row);
				    $clave_numero = $nuevo_afiliado["clave_numero"];
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
			
			
			//} else {
			//	$no_insertados++;
				//print_r($codigo." -  ".$row[2]. " - ". $row[10]."<br>");
			//}
            $i++;
		
		}
 		// close the file
 		fclose($handle);
 		// return the messages
 		return $cantidad_afiliados;
	}

    function construirAfiliado($row){
    	 $nuevo_afiliado = array();
		 $nuevo_afiliado["clave_excaja"] = $row[0];
		 $nuevo_afiliado["clave_tipo"] = $row[1];
		 
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