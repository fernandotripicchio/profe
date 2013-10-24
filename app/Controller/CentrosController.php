<? 
 class CentrosController extends AppController {
  var $name = 'Centros';
  public $helpers = array("Html","Form");
  var $components = array("RequestHandler");
  var $uses = array('Centro', 'Localidad', 'Departamento', 'Afiliado');
  public $paginate = array(
                          'limit' => 50,
                               'order' => array(
                               'Centro.nombre' => 'asc',
                               'recursive' => 2
                               )
                           );
  function beforeFilter() {
  	 parent::beforeFilter();
     $this->layout = "admin";
  }
  
  
  public function index() {	
    $centros = $this->paginate('Centro');
    $this->set('centros', $centros);	 
     
  }
  
  
  public function add() {
    if (!empty($this->data)) {
	      $this->Centro->create();
        
		if ($this->Cadete->save($this->data)) {
			$this->Session->setFlash(__('Se guardo el Centro con éxito', true));
			$this->redirect(array('action'=>'index'));
		} else {
			$this->Session->setFlash(__('El Centro no se pudo guardar. Por favor intente de nuevo.', true));
	
		}

    }  	
  }
  
  public function edit($id){
    $this->Centro->id = $id;
    if (!$this->Centro->exists()) {
            throw new NotFoundException(__('Centro invalido'));
    }
    if ($this->request->is('get')) {
        $this->request->data = $this->Centro->read();

    } else {
        if ($this->Centro->save($this->request->data)) {
            $this->Session->setFlash('Se modifico el Centro con éxito', "sucess");
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Session->setFlash('No se pudo modificar el Centro', "error");
        }
    }  	
  }
  
  
  public function show($id){
    $this->Centro->id = $id;
    if (!$this->Centro->exists()) {
            throw new NotFoundException(__('Centro invalido'));
    }  	
	
   $this->set('centro', $this->Centro->read());	
	
  }



 

 public function importar_cap(){
    $cantidad_centros = 0; 
    if (!empty($this->data))  {
    	     
    	    set_time_limit ( 3000 );
            $cantidad_centros = $this->Cap->import($this->data['field']['tmp_name']);
            //$this->redirect('somecontroller/someaction');
    }	 
	 
	$this->set(compact("cantidad_centros")); 
	   
  }
 

 public function importar_temporal(){
    $cantidad_centros = 0; 
    if (!empty($this->data))  {
    	    set_time_limit ( 3000 );
            $cantidad_centros = $this->Centro->import_temporal($this->data['field']['tmp_name']);
            //$this->redirect('somecontroller/someaction');
    }	 
	 
	$this->set(compact("cantidad_centros")); 
	   
  }
  
  
  public function getCentrosByDepartamento($departamento_id ){
    $this->layout = 'ajax';
	$new_centros = array();
	$centros = $this->Centro->getCentrosLocation($provincia_id = 19, $departamento_id);
    $centros = json_encode(compact('centros'));
    $this->set(compact("centros"));
  }    


  public function getCentrosByDepartamentoLocalidad($departamento_id, $localidad_id) {
    $this->layout = 'ajax';
	$new_centros = array();
	$centros = $this->Centro->getCentrosLocation($provincia_id = 19, $departamento_id, $localidad_id);
	if (empty ( $centros ) ) {
		$centros = $this->Centro->getCentrosLocation($provincia_id = 19, $departamento_id);
	}
    $centros = json_encode(compact('centros'));
    $this->set(compact("centros"));  	
  }
  
  
  
  public function getCentros($localidad_id ){

     if($this->RequestHandler->isAjax()) {
         //Configure::write('debug', 2);
         $this->layout = 'ajax';

         $centros = $this->Centro->find("all", array('contain' => array('Departamento'),
                                                     "conditions" => array("localidad_id" => $localidad_id), "Centro.centro" => 34,
                                                     "order" => "Centro.nombre ASC",                                                            
                                                     "recursive" => -1));
         $centros = json_encode(compact('centros'));
         $this->set(compact("centros"));
     }
  }   
  
  
  
  public function afiliados($id){
  	$afiliados = $this->Afiliado->find("all");
	$this->set(compact("afiliados"));
	
  }
  
  
  

 
 }