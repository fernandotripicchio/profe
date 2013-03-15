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
                    if (isset($this->params["data"]["keys"])) {
				         $this->Session->write('Afiliados.keys', strtoupper( $this->params["data"]["keys"]["keys"] ));
						 $this->Session->write('Afiliados.filters', $this->params["data"]["filters"]);
 						 $this->Session->write('Afiliados.departamentos', $this->params["data"]["departamentos"]);
                         $afiliadosSession = $this->Session->read("Afiliados");                          
                    } else {
                        die("Error en la busqueda");
                    }
     } else {
         $afiliadosSession = $this->Session->read("Afiliados");
         if (!isset($afiliadosSession)){
              $afiliadosSession = $this->resetForm();   
         }
     }     

     if ($this->request->is('post')  && isset($this->data["Limpiar"])){
     	
         $afiliadosSession = $this->resetForm();
         
     } 	
	

   
   $condition .= $this->buildCondition( strtoupper( $afiliadosSession["keys"] ) , $afiliadosSession["filters"] , $filtros);
   if (!empty( $afiliadosSession["departamentos"] )){
			$condition .= " and Afiliado.departamento = ". $afiliadosSession["departamentos"];
    }

	
    $afiliados = $this->paginate('Afiliado', $condition);
	$this->getDepartamentos();
	$this->set('afiliadosSession', $afiliadosSession);
    $this->set('afiliados', $afiliados);	 
	$this->set('filtros', $filtros);	 
  }
  
 
  public function resetForm(){
     $this->Session->write('Afiliados.keys', "" );
	 $this->Session->write('Afiliados.filters', "");
     $this->Session->write('Afiliados.departamentos', "");
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
	            $this->redirect(array("controller" => "afiliados", "action" => "show", $id));
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
  

 }