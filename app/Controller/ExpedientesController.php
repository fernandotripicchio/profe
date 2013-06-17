<? 
 class ExpedientesController extends AppController {
  var $name = 'Expedientes';
  public $helpers = array("Html","Form");
  var $components = array("RequestHandler");
  var $uses = array('Expediente', 'TipoExpediente','Afiliado', 'Diagnostico');
  public $paginate = array(
                          'limit' => 50,
                               'order' => array(
                               'Expediente.id' => 'asc',
                               'recursive' => 2
                               )
                           );
						   
						   
  function beforeFilter() {
  	 parent::beforeFilter();
     $this->layout = "admin";
  }
  
  
  public function index() {
   $filtros =  array("Todos" => "Todos", "Expediente.id" => "Nro Expediente","Afiliado.nombre" => "Afiliado Nombre", "Afiliado.documento" => "Afiliado Documento");
   $condition = "";
   print_r( $this->params );
   if ($this->request->is('post') ) {
     	            if ($this->params["data"]["keys"]["submit_action"] == "reset") {
     	            	 $expedientesSession = $this->resetForm();
     	            }  else { 
	                    if (isset($this->params["data"]["keys"])) {
					         $this->Session->write('Expedientes.keys', strtoupper( $this->params["data"]["keys"]["keys"] ));
							 $this->Session->write('Expedientes.filters', $this->params["data"]["filters"]);
	                         $expedientesSession = $this->Session->read("Expedientes");                          
	                    } else {
	                        die("Error en la busqueda");
	                    }
					}
   } else {
         $expedientesSession = $this->Session->read("Expedientes");
         if (!isset($expedientesSession)){
              $expedientesSession = $this->resetForm();   
         }
   }     
   $condition .= $this->buildCondition( strtoupper( $expedientesSession["keys"] ) , $expedientesSession["filters"] , $filtros);
   $expedientes = $this->paginate('Expediente', $condition);
   $this->getEstadosExpediente();
   $this->set('expedientes', $expedientes);	 
   $this->set('expedinetesSession', $expedientesSession);
   $this->set('filtros', $filtros);	   
     
  }
  
  
  public function getEstadosExpediente(){
  	$estados_expedientes = array("0" => "Nuevo", "1" => "En Proceso", "2" =>"Cerrado", "3"  => "Eliminado");
    $this->set('estados_expedientes', $estados_expedientes);	
  }
  
  public function resetForm(){
     $this->Session->write('Expedientes.keys', false );
	 $this->Session->write('Expedientes.filters',false);
     $expedientesSession = $this->Session->read("Expedientes");
     return $expedientesSession;
  }  
  
  public function resetearAfiliado() {
  	$afiliado = array();
	$afiliado["id"]          = false;
	$afiliado["nombre"]      = false;
	$afiliado["documento"]   = false;
	$afiliado["nro_pension"] = false;
  	return $afiliado;
  	
  }
  public function obtenerAfiliado($afiliado_id) {
    $afiliado_db 	 = $this->Afiliado->find("first", array("conditions" => array("id" => $afiliado_id), "recursive" => -1  ));
	$afiliado = array();
	$afiliado["id"] 	      = $afiliado_db["Afiliado"]["id"];
	$afiliado["nombre"]       = $afiliado_db["Afiliado"]["nombre"];
	$afiliado["documento"]    = $afiliado_db["Afiliado"]["documento"];
	$afiliado["nro_pension"]  = $this->Afiliado->nro_pension($afiliado_db);
	return $afiliado;
  }
  

 public function getDatos(){
 	//Tipos Expedientes	
 	$tipos_expedientes = $this->TipoExpediente->find("all", array("recursive" => -1));
 	$tipos = array();
 	foreach ($tipos_expedientes as $tipo) {
		 $tipos[$tipo["TipoExpediente"]["id"]] = $tipo["TipoExpediente"]["nombre"];
	 }
	//Diagnosticos
 	$diagnosticos_db = $this->Diagnostico->find("all", array("order" => "nombre asc","recursive" => -1));
 	$diagnosticos = array();
 	foreach ($diagnosticos_db as $diagnostico) {
		 $diagnosticos[$diagnostico["Diagnostico"]["id"]] = $diagnostico["Diagnostico"]["nombre"];
	 }
		
	
 	$this->set("tipos_expedientes", $tipos);
	$this->set("diagnosticos", $diagnosticos);
 }
  
  
  public function add($afiliado_id=false) {
  	
	//Ver si pasa afiliado como parametros
	//Si lo manda no agregar buscador en la pagina
	
	$this->getDatos();
	$afiliado = $this->resetearAfiliado();	
	if ( $afiliado_id )  {
  		 $afiliado = $this->obtenerAfiliado($afiliado_id);
	}
	
	$nuevo_expediente = true;
	
    if (!empty($this->data)) {
	    $this->Expediente->create();        
		
		$data["Expediente"] =  $this->data["Expediente"];
		$data["Expediente"]["fecha_inicio"] = $this->fechaSpanishDB($this->data["Expediente"]["fecha_inicio"]);
		
		if ($this->Expediente->save($data)) {
			$expediente_id =  $this->Expediente->getInsertId();
			$this->Session->setFlash(__('Se guardo el expediente con éxito', true));
			$this->redirect(array('action'=>'edit', $expediente_id));
		} else {
			$this->Session->setFlash(__('El Expediente no se pudo guardar. Por favor intente de nuevo.', true));
		}

    }  	
	//Fecha inicio valor por defecto es hoy
	$fecha_inicio = date("d/m/Y");	
	$this->set('afiliado', $afiliado);
	$this->set('fecha_inicio', $fecha_inicio);
	$this->set('nuevo_expediente', $nuevo_expediente);	
    
  }
  
  
  
  public function edit($id) {
    $this->Expediente->id = $id;
	$nuevo_expediente = false;	
	$this->getDatos();	
    if (!$this->Expediente->exists()) {
            throw new NotFoundException(__('Expediente invalido'));
    }
	
	$expediente = $this->Expediente->read();
	$afiliado = $this->obtenerAfiliado( $expediente["Expediente"]["afiliado_id"] );
	
    if ($this->request->is('get')) {
        $this->request->data = $this->Expediente->read();
    } else {
  		 $data["Expediente"] =  $this->data["Expediente"];
		 $data["Expediente"]["fecha_inicio"] = $this->fechaSpanishDB($this->data["Expediente"]["fecha_inicio"]);
    	
        if ($this->Expediente->save($data)) {
            $this->Session->setFlash('Se modifico el Expediente con éxito', "sucess");
            $this->redirect(array('action' => 'edit', $id));
        } else {
            $this->Session->setFlash('No se pudo modificar el Expediente', "error");
        }
    }  
	
    		
	$fecha_inicio = $expediente["Expediente"]["fecha_inicio"];
	$this->getEstadosExpediente();
	$this->set('fecha_inicio', $fecha_inicio);
    $this->set('expediente', $expediente);		
    $this->set('afiliado'  , $afiliado);		
	$this->set('nuevo_expediente', $nuevo_expediente);	
  }
  
  
  public function show($id) {
    $this->Expediente->id = $id;
    if (!$this->Expediente->exists()) {
            throw new NotFoundException(__('Expediente invalido'));
    }  	
   $afiliado = $this->Expediente->read() ;
   $nro_pension  = $this->Afiliado->nro_pension($afiliado);
   $this->set('expediente', $this->Expediente->read());	
   $this->set('nro_pension', $nro_pension);
	
  }
  
  
///////////////////////////////////////////////////////////////////////////////////////////////////////
//     FUNCTION para SQL
///////////////////////////////////////////////////////////////////////////////////////////////////////
    
  public function buildCondition($keyword, $filters, $filtros) {
  	//$conditions = "Afiliado.activo = true and ";	   
  	$initial_conditions = "Afiliado.activo = 1 ";
  	$conditions = "";
	if ( $filters  == "Todos") {		
   	    $conditions .=  $this->all_condition($filtros, $keyword);
	} else {
	   	$conditions .= $this->sql_condition($filters, $keyword);
	}
	
	if (!empty( $conditions )) {
		$initial_conditions = $initial_conditions . " and " . $conditions;
	}
   	return $initial_conditions;
 } 
 

 

  public function sql_condition($key, $keyword, $operator = ' and' ) {
  	   
  	  $condition = ""; 
      switch ($key) {
			case 'Afiliado.nombre':							  
				  $condition = " $key like \"%$keyword%\" $operator";
			      break;
		   case 'Afiliado.documento':						  
		  	      $condition = " $key like \"%$keyword%\" $operator";
				  break;
				  
		   case 'Expediente.id':
		  	      $condition = " $key like \"%$keyword%\" $operator";
				  break;
			   		  
	   }
	  
      $condition = $this->cleanCondition("and", $condition);
      return $condition;
   }   
    

 }