<? 
 class AfiliadosController extends AppController {
  var $name = 'Afiliados';
  public $helpers = array("Html","Form");
  var $components = array("RequestHandler", 'Session');
  var $uses = array('Afiliado', 'Provincia' ,'Departamento', 'Localidad', 'Centro');
  public $paginate = array(
                          'limit' => 50,
                               'order' => array('Afiliado.nombre' => 'asc')
                           );
	
	
  function beforeFilter() {
  	 parent::beforeFilter();
     $this->layout = "admin";
  }
  
  
  public function index() {  
	$filtros =  array("Todos" => "Todos", "Afiliado.nombre" => "Nombre", "Afiliado.documento" => "Documento");
	$condition = "";
	
     //Set Session variables

     if ($this->request->is('post') ) {

     	            if ($this->params["data"]["keys"]["submit_action"] == "reset") {
     	            	 $afiliadosSession = $this->resetForm();
     	            }  else { 
	                    if (isset($this->params["data"]["keys"])) {
					         $this->Session->write('Afiliados.keys', strtoupper( $this->params["data"]["keys"]["keys"] ));
							 $this->Session->write('Afiliados.filters', $this->params["data"]["filters"]);
	 						 $this->Session->write('Afiliados.departamentos', $this->params["data"]["departamentos"]);
	 						 $this->Session->write('Afiliados.localidades', $this->params["data"]["localidades"]);
							 $this->Session->write('Afiliados.centros', $this->params["data"]["centros"]);
	                         $afiliadosSession = $this->Session->read("Afiliados");                          
	                    } else {
	                        die("Error en la busqueda");
	                    }
					}
     } else {
         $afiliadosSession = $this->Session->read("Afiliados");
         if (!isset($afiliadosSession)){
              $afiliadosSession = $this->resetForm();   
         }
     }     

   
   $condition .= $this->buildCondition( strtoupper( $afiliadosSession["keys"] ) , $afiliadosSession["filters"] , $filtros);
   
   if (!empty( $afiliadosSession["departamentos"] )) {
			$condition .= " and Afiliado.departamento = ". $afiliadosSession["departamentos"];
    }

   if (!empty( $afiliadosSession["localidades"] )) {
			$condition .= " and Afiliado.localidad_id = ". $afiliadosSession["localidades"];
    }

   if (!empty( $afiliadosSession["centros"] )) {
			$condition .= " and Afiliado.centro_id = ". $afiliadosSession["centros"];
    }

	
    $afiliados = $this->paginate('Afiliado', $condition);
	$this->getDepartamentos();
	$this->getLocalidades(19,$afiliadosSession["departamentos"]);
	$this->getCentros(19,$afiliadosSession["departamentos"] ,$afiliadosSession["localidades"]);
	
	//Hasta ACA
	$this->set('afiliadosSession', $afiliadosSession);
    $this->set('afiliados', $afiliados);	 
	$this->set('filtros', $filtros);	


	 
  }
  
 
  public function resetForm(){
     $this->Session->write('Afiliados.keys', false );
	 $this->Session->write('Afiliados.filters',false);
     $this->Session->write('Afiliados.departamentos', false);
     $this->Session->write('Afiliados.departamentos', false);
 	 $this->Session->write('Afiliados.localidades',false);
	 $this->Session->write('Afiliados.centros', false);
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
	        	
				//Foto de Perfil
				//print_r($this->data["Afiliado"]["perfil"]);
				print_r( $this->data["Afiliado"]["field"] );
				$handle = fopen($this->data["Afiliado"]["field"]["tmp_name"], "r");
				 //move_uploaded_file($this->data["Afiliado"]["field"]["tmp_name"], 'Afiliados/perfiles');
				//die;
				
	            $this->Session->setFlash("Se modificó el Afiliado con éxito", "success");			
	            //$this->redirect(array("controller" => "afiliados", "action" => "show", $id));
	        } else {
	        	$this->Session->setFlash("No se pudo modificar el Afiliado", "error");	
	        }
	}
	//Departamentos
	$afiliado        = $this->Afiliado->find("first", array("conditions" => array("Afiliado.id" => $id)));
	$departamento_id = $afiliado["Localidad"]["departamento"];
	$departamento    = $this->Departamento->find("first", array("conditions" => array("Departamento.departamento" => $departamento_id, "Departamento.provincia" => 19)));
	$this->getDepartamentos();
	$this->getCentros();
	$this->getLocalidades($afiliado["Localidad"]["provincia"], $departamento["Departamento"]["departamento"] );
	$this->set('afiliado', $this->Afiliado->read());	
	$this->set('departamento', $departamento);	
  }
  
  
  public function show($id) {
   $afiliado = $this->Afiliado->find("first", array("conditions" => array("Afiliado.id" => $id)));
   $this->set('afiliado', $afiliado);	
	   		
  }
  
 
 public function importar() {
    $cantidad_afiliados = 0; 
    if (!empty($this->data))  {
	    	    set_time_limit ( 3000 );
	            $cantidad_afiliados = $this->Afiliado->import($this->data['field']['tmp_name']);
	            
    }	 	 
	$this->set(compact("cantidad_afiliados"));	   
  }
 
 
 public function bajas(){
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
	$afiliado        = $this->Afiliado->find("first", array("conditions" => array("Afiliado.id" => $id)));
	//$departamento_id = $afiliado["Localidad"]["departamento"];
	//$departamento    = $this->Departamento->find("first", array("conditions" => array("Departamento.departamento" => $departamento_id, "Departamento.provincia" => 19)));
	$this->getDepartamentos();
	$this->getCentros();
	$this->getLocalidades($afiliado["Afiliado"]["provincia"], $afiliado["Afiliado"]["departamento"] );
    $this->set('afiliado', $afiliado);	 	
	
 }


public function carnet_show($id){
	$this->Afiliado->id = $id;
	if (!$this->Afiliado->exists()) {
	            throw new NotFoundException(__('Afiliado invalido'));
	}		
	$afiliado  = $this->Afiliado->find("first", array("conditions" => array("Afiliado.id" => $id)));
	$this->set('afiliado', $afiliado);	 
	
}

 
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
		   case 'Departamento.id':
		  	      $condition = " $key = $keyword $operator";
				  break;
		   case 'Localidad.id':
		  	      $condition = " $key = $keyword $operator";
				  break;				  
		   case 'Centro.id':
		  	      $condition = " $key = $keyword $operator";
				  break;
	   }
	  
      $condition = $this->cleanCondition("and", $condition);
      return $condition;
  }   
    
  

 }