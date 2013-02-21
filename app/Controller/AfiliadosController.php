<? 
 class AfiliadosController extends AppController {
  var $name = 'Afiliados';
  public $helpers = array("Html","Form");
  var $components = array("RequestHandler");
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
  	if ( isset($this->params["data"]["keys"]) ){  		
  		$condition .= $this->buildCondition( strtoupper( $this->params["data"]["keys"]["keys"] ) , $this->params["data"]["filters"], $filtros);
        
  	};	
    $afiliados = $this->paginate('Afiliado', $condition);
	$this->getDepartamentos();
    $this->set('afiliados', $afiliados);	 
	$this->set('filtros', $filtros);	 
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
	            $this->redirect(array('action' => 'index'));
	        } else {
	        	$this->Session->setFlash("No se pudo modificar el Afiliado", "error");	
	        }
	    }
		//Departamentos
		$afiliado        = $this->Afiliado->find("first", array("conditions" => array("Afiliado.id" => $id)));
		$departamento_id = $afiliado["Localidad"]["departamento_id"];
		$departamento    = $this->Departamento->find("first", array("conditions" => array("Departamento.departamento_id" => $departamento_id, "Departamento.provincia_id" => 19)));
		$this->getDepartamentos();
		$this->getCentros();
		$this->getLocalidades($afiliado["Localidad"]["provincia_id"], $departamento["Departamento"]["departamento_id"] );
		$this->set('afiliado', $this->Afiliado->read());	
		$this->set('departamento', $departamento);	
	  	
  }
  
  
  public function show($id) {
	   $this->Afiliado->unbindModel(array(
	    'belongsTo' => array('Localidad')
	    ));
	 
	   $this->Afiliado->bindModel(array(
	    'hasOne' => array(
	        'Localidad' => array(
	            'foreignKey' => false,
	            'conditions' => array('Localidad.id = Afiliado.localidad_id and Localidad.provincia_id = 19 ')
	        ),
	        'Departamento' => array(
	            'foreignKey' => false,
	            'conditions' => array('Localidad.departamento_id = Departamento.departamento_id and Departamento.provincia_id = 19 ')
	        )    
			
	    )
	   ));	   
		      
		
	   $afiliado = $this->Afiliado->find("first", array("conditions" => array("Afiliado.id" => $id), 
	                                                    "contain" => array('Localidad', 'Departamento')
									                   )
					                 );
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
  	  $conditions = "Afiliado.activo = 1 and ";	   
	  if ( $filters  == "Todos") {
   	    $conditions .= $this->all_condition($filtros, $keyword);
	  } else {
	   	$conditions .= $this->sql_condition($filters, $keyword);
	  }
   	  return $conditions;
  }
  

 }