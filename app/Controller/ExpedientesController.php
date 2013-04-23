<? 
 class ExpedientesController extends AppController {
  var $name = 'Expedientes';
  public $helpers = array("Html","Form");
  var $components = array("RequestHandler");
  var $uses = array('Expediente', 'Afiliado');
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
    $expedientes = $this->paginate('Expediente');
    $this->set('expedientes', $expedientes);	 
     
  }
  
  
  public function resetearAfiliado(){
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
  

 
  
  
  public function add($afiliado_id=false) {
  	
	//Ver si pasa afiliado como parametros
	//Si lo manda no agregar buscador en la pagina
	
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
			$this->Session->setFlash(__('Se guardo el expediente con éxito', true));
			$this->redirect(array('action'=>'index'));
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
  
  
  
  public function edit($id){
    $this->Expediente->id = $id;
    if (!$this->Expediente->exists()) {
            throw new NotFoundException(__('Expedientes invalido'));
    }
    if ($this->request->is('get')) {
        $this->request->data = $this->Expediente->read();

    } else {
        if ($this->Expediente->save($this->request->data)) {
            $this->Session->setFlash('Se modifico el Expediente con éxito', "sucess");
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Session->setFlash('No se pudo modificar el Expediente', "error");
        }
    }  	
  }
  
  
  public function show($id){
    $this->Expediente->id = $id;
    if (!$this->Expediente->exists()) {
            throw new NotFoundException(__('Expediente invalido'));
    }  	
	
   $this->set('expediente', $this->Expediente->read());	
	
  }

 }