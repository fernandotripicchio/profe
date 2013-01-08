<?
 
 class AdministracionesController extends AppController {
  var $name = 'Administraciones';
  public $helpers = array("Html","Form");
  var $components = array("RequestHandler");
  var $uses = array('Afiliado');
  public $paginate = array(
                          'limit' => 50,
                               'order' => array(
                               'Afiliado.nombre' => 'asc'
        )
    );
  function beforeFilter() {
     $this->layout = "admin";
  }
  
  
  public function index(){
    $afiliados = $this->paginate('Afiliado');
    $this->set('afiliados', $afiliados);	 
  }
  
  
  public function add(){
    if (!empty($this->data)) {
	      $this->Afiliado->create();
        
		if ($this->Cadete->save($this->data)) {
			$this->Session->setFlash(__('Se guardo el Afiliado con éxito', true));
			$this->redirect(array('action'=>'index'));
		} else {
			$this->Session->setFlash(__('El Afiliado no se pudo guardar. Por favor intente de nuevo.', true));
	
		}

    }  	
  }
  
  public function edit($id){
    $this->Afiliado->id = $id;
    if (!$this->Afiliado->exists()) {
            throw new NotFoundException(__('Afiliado invalido'));
    }
    if ($this->request->is('get')) {
        $this->request->data = $this->Afiliado->read();

    } else {
        if ($this->Cadete->save($this->request->data)) {
            $this->Session->setFlash('Se modifico el Afiliado con éxito');
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Session->setFlash('No se pudo modificar el Afiliado.');
        }
    }  	
  }
  
  
  public function show($id){
    $this->Afiliado->id = $id;
    if (!$this->Afiliado->exists()) {
            throw new NotFoundException(__('Afiliado invalido'));
    }  	
	
   $this->set('afiliado', $this->Afiliado->read());	
	
  }
  

 
 }