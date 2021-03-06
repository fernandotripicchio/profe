<? 
 class AfiliadosController extends AppController {
  var $name = 'Afiliados';
  public $helpers = array("Html","Form");
  var $components = array("RequestHandler", 'Session');
  var $uses = array('Afiliado', 'Provincia' ,'Departamento', 'Localidad', 'Centro', 'Prestacion', "Prestador", "Diagnostico", "Clinica", "Enfermedad", "Expediente");
  public $paginate = array(
                          'limit' => 50,
                               'order' => array('Afiliado.nombre' => 'asc')
                           );
	
	
  function beforeFilter() {
  	 parent::beforeFilter();
     $this->layout = "admin";
  }
  
  public function para_imprimir(){
  	$afiliados = $this->paginate('Afiliado', "Afiliado.por_imprimir = 0");
	$this->set('afiliados', $afiliados);	 
  }
  
  	public function map() {

	}
  
  
  public function index() {  
	$filtros =  array("Todos" => "Todos", "Afiliado.nombre" => "Nombre", "Afiliado.documento" => "Documento");
	$filtros_activos = array("Todos" => "Todos", "activos" => "Activos", "baja" => "Baja");
	$condition = "";	
	
    if ($this->request->is('post') ) {   	            		
     	            if ($this->params["data"]["keys"]["submit_action"] == "reset") {
     	            	 $afiliadosSession = $this->resetForm();
     	            }  else { 
	                    if (isset( $this->params["data"]["keys"]) ) {
					         $this->Session->write('Afiliados.keys', strtoupper( $this->params["data"]["keys"]["keys"] ));
							 $this->Session->write('Afiliados.filters', $this->params["data"]["filters"]);
							 $this->Session->write('Afiliados.filtros_activos', $this->params["data"]["filtros_activos"]);
	                         $afiliadosSession = $this->Session->read("Afiliados");                          
	                    } else {
	                         die("Error en la busqueda");
	                    }
					}
     } else {
         $afiliadosSession = $this->Session->read("Afiliados");
         if (!isset($afiliadosSession)) {
              $afiliadosSession = $this->resetForm();   
         }
     }     

     //Keys
     //Filtro Nombre, DNI
     //Filtro Estado: Baja, Activo
     //Todos los filtros?
     $condition .= $this->buildCondition( strtoupper( $afiliadosSession["keys"] ) , $afiliadosSession["filters"], $afiliadosSession["filtros_activos"]  , $filtros);
     $afiliados = $this->paginate('Afiliado', $condition);
     $this->set('afiliadosSession', $afiliadosSession);
     $this->set('afiliados', $afiliados);	 
     $this->set('filtros', $filtros);
     $this->set('filtros_activos', $filtros_activos);  
  }
  
 
  public function resetForm() {
     $this->Session->write('Afiliados.keys', false );
	 $this->Session->write('Afiliados.filters',false);
	 $this->Session->write('Afiliados.filtros_activos',false);
     $afiliadosSession = $this->Session->read("Afiliados");
     return $afiliadosSession;
  }
   
  
  
  public function edit( $id ) {
	$this->Afiliado->id = $id;		
	if (!$this->Afiliado->exists()) {
	            throw new NotFoundException(__('Afiliado invalido'));
	}
	
	if ($this->request->is('get')) {
	        $this->request->data = $this->Afiliado->read();	
	} else {
	        if ($this->Afiliado->save($this->request->data)) {
	            $this->Session->setFlash("Se modificó el Afiliado con éxito", "success");	
				$this->redirect("/afiliados/show/".$id);		
	        } else {
	        	$this->Session->setFlash("No se pudo modificar el Afiliado", "error");	
	        }
	}
	$afiliado = $this->Afiliado->read();
	$departamento_id = $afiliado["Localidad"]["departamento"];
	$departamento    = $this->Departamento->find("first", array("conditions" => array("Departamento.departamento" => $departamento_id, "Departamento.provincia" => 19)));
	$this->getDepartamentos();
	$this->getCentros(19,$afiliado["Afiliado"]["departamento_id"] );
	$this->getLocalidades(19,$afiliado["Afiliado"]["departamento_id"]);
	$this->set('afiliado', $this->Afiliado->read());	
	$nro_pension  = $this->Afiliado->nro_pension($afiliado);	 	
	$this->set('nro_pension', $nro_pension);	
  }
  
  
  public function show($id) {
   $afiliado = $this->Afiliado->find("first", array("conditions" => array("Afiliado.id" => $id)));
   $this->set('afiliado', $afiliado);	
   $nro_pension  = $this->Afiliado->nro_pension($afiliado);	 	
   $prestaciones = $this->Prestacion->find("all", array("conditions" => array("afiliado_id" => $id), "recursive" => 0 ));
   $this->set('nro_pension', $nro_pension);   
   $this->set('prestaciones', $prestaciones);	   		
  }
  
  
  public function historial($id) {
   $afiliado = $this->Afiliado->find("first", array("conditions" => array("Afiliado.id" => $id)));
   
   $this->set('afiliado', $afiliado);	
   $nro_pension  = $this->Afiliado->nro_pension($afiliado);   	 	
   $prestaciones = $this->Prestacion->find("all", array("conditions" => array("afiliado_id" => $id), "recursive" => 0 ));
   $clinicas     = $this->Clinica->find("all", array("conditions" => array("afiliado_id" => $id), "recursive" => 0 ));
   $expedientes  = $this->Expediente->find("all", array("conditions" => array("afiliado_id" => $id), "recursive" => 0 ));   
   $this->set('nro_pension', $nro_pension);   
   $this->set('prestaciones', $prestaciones);
   $this->set('clinicas', $clinicas);   	   	
   $this->set('expedientes', $expedientes);
   
  }  
 
 public function importar() {
    $cantidad_afiliados = 0; 
    if (!empty($this->data))  {
	    	    set_time_limit ( 3000 );
	            $cantidad_afiliados = $this->Afiliado->import($this->data['field']['tmp_name']);
	            
    }	 	 
	$this->set(compact("cantidad_afiliados"));	   
  }
 
 
 public function bajas() {
    $cantidad_afiliados = 0; 
    if (!empty($this->data))  {
	    	    set_time_limit ( 3000 );
	            $cantidad_afiliados = $this->Afiliado->bajas($this->data['field']['tmp_name']);	            
    }	 	 
	$this->set(compact("cantidad_afiliados"));	    	
 }

 public function carnet($id) {
	$this->Afiliado->id = $id;
	if (!$this->Afiliado->exists()) {
	            throw new NotFoundException(__('Afiliado invalido'));
	}	
			 	
	if ($this->request->is('get')) {
	        $this->request->data = $this->Afiliado->read();	
	} else {
	        if ($this->Afiliado->save($this->request->data)) {
	            $this->Session->setFlash("Se modificó el Afiliado con éxito", "success");			
	            $this->redirect(array("controller" => "afiliados", "action" => "carnet_show", $id));
	        } else {
	        	$this->Session->setFlash("No se pudo modificar el Afiliado", "error");	
	        }
	}			
	$afiliado = $this->Afiliado->read();

	$this->getDepartamentos();
    $this->getCentros(19,$afiliado["Afiliado"]["departamento_id"] );
	$this->getLocalidades($afiliado["Afiliado"]["provincia"], $afiliado["Afiliado"]["departamento"] );	
    $this->set('afiliado', $afiliado);	
	$nro_pension  = $this->Afiliado->nro_pension($afiliado);	 	
	$this->set('nro_pension', $nro_pension);
 }


public function carnet_show($id) {
	$this->Afiliado->id = $id;
	if (!$this->Afiliado->exists()) {
	            throw new NotFoundException(__('Afiliado invalido'));
	}		
	$afiliado  = $this->Afiliado->find("first", array("conditions" => array("Afiliado.id" => $id)));
	$nro_pension  = $this->Afiliado->nro_pension($afiliado);
	$this->set('afiliado', $afiliado);	 
    $this->set('nro_pension', $nro_pension);
}

public function imprimir_carnet($id){
	$this->layout = "print";
	$this->Afiliado->id = $id;
	if (!$this->Afiliado->exists()) {
	            throw new NotFoundException(__('Afiliado invalido'));
	}		
	$afiliado  = $this->Afiliado->find("first", array("conditions" => array("Afiliado.id" => $id)));
	$nro_pension  = $this->Afiliado->nro_pension($afiliado);
	$this->set('afiliado', $afiliado);	 
    $this->set('nro_pension', $nro_pension);
}


 
public function buildCondition($keyword, $filters, $filtros_activos ,$filtros) {
  	$initial_conditions = "1 ";
  	$conditions = "";
		
	if ( $filters  == "Todos") {
		//Busca por todos los filtros con la palabra cable		
   	    $conditions .=  $this->all_condition($filtros, $keyword);
	} else {
		//Busca por algo especifico
	   	$conditions .= $this->sql_condition($filters, $keyword);
	}
	

	if ($filtros_activos != "Todos") {
	   $conditions .=  $this->sql_condition($filtros_activos, "1");
	}
	
	if (!empty( $conditions )) {
		$initial_conditions = $initial_conditions . " and " . $conditions;
	}
   	return $initial_conditions;
}
 
public function getAfiliado( $key ) {
     $afiliados = array();
     $new_afiliados = array();
     $afiliado = $this->Afiliado->find("first", array( "conditions" => array("activo" => "1", "documento" => $key)
	                                                  , "recursive" => -1 )
									  );
     if( $this->RequestHandler->isAjax() ) {
     	 $this->layout = 'ajax';
		 $afiliado = json_encode(compact('afiliado'));
	 }
	 $this->set(compact("afiliado"));
}

 
///////////////////////////////////////////////////////////////////////////////////////////////////////
//     FUNCTION para SQL
///////////////////////////////////////////////////////////////////////////////////////////////////////
  
public function sql_condition($key, $keyword, $operator = ' and' ) {
  	  $condition = ""; 
      switch ($key) {
			case 'Afiliado.nombre':							  
				  $condition = " $key like \"%$keyword%\" $operator";
			      break;
		   case 'Afiliado.documento':						  
		  	      $condition = " $key like \"%$keyword%\" $operator";
				  break;
				  
		   case 'activos':
			   	  $condition = " and Afiliado.activo = 1";
			      break;
		   case 'baja':
			   	  $condition = " and Afiliado.activo = 0 ";
			      break;
			   		   	  
	   }
	  
      $condition = $this->cleanCondition("and", $condition);
      return $condition;
  }   

//////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////

public function export_afiliados($pagina = 0){

      $registers = true;
	 
     //Obtengo la cantidad a paginar
      $sql =  " select count(afiliados.id) as size from afiliados";
      $afiliado_size=$this->Afiliado->query($sql);

      $offset = 0;
      if (empty($afiliado_size)) {
           $size  = 0;
      } else {
          $size = $afiliado_size[0][0]["size"];
          $offset = round($size/50);
      }
      
      $pagina_to_show = $pagina*50;

      //Obtengo el user id, rut de los usuarios que contestaron en esa fecha
      $sql =  "SELECT * from afiliados limit 50 offset $pagina_to_show";      
      $afiliados_data=$this->Afiliado->query($sql);
	  
      if(empty($afiliados_data))
		//die("No hay registros entre las fechas seleccionadas");
                $registers = false;


     //Data
      if ($registers) {
           foreach($afiliados_data as $a) {
                  $documento = $a["afiliados"]["documento"];
			      $afiliado_id = $a["afiliados"]["id"];
      			  $sql =  "update doseps set afiliado_id = $afiliado_id where numerodoc = $documento";      
                  $afiliados_data=$this->Afiliado->query($sql);			       
                  

           } //foreach
      } // del if de register  

    
     //Decide if show the csv file or to reload the page
     if (  ($pagina < $offset) && $registers ) {       
          $nueva_pagina = $pagina+1;
          echo "<script>window.location.href='".Router::url("export_afiliados/$nueva_pagina")."'</script>";
          //$this->redirect(array("action" => "export_afiliados", $nueva_pagina));
          exit();
      } 
       
      die();
  }






}