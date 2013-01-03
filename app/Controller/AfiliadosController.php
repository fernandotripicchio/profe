<?
 
 class AfiliadosController extends AppController {
  var $name = 'Afiliados';
  public $helpers = array("Html","Form");
  var $components = array("RequestHandler");
  var $uses = array('Afiliado');
  public $paginate = array(
                          'limit' => 10,
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
  
  
  public function importar(){
    $cantidad_afiliados = 0; 
    if (!empty($this->data))  {
    	    set_time_limit ( 3000 );
            $cantidad_afiliados = $this->Afiliado->import($this->data['field']['tmp_name']);
            //$this->redirect('somecontroller/someaction');
    }	 
	 
	$this->set(compact("cantidad_afiliados")); 
	   
  }
 
 }