<?
 
 class AfiliadosController extends AppController {
  var $name = 'Afiliados';
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
  
  /*
  public function add(){
    if (!empty($this->data)) {
	      $this->Afiliado->create();
        
		if ($this->Cadete->save($this->data)) {
			//$this->Session->setFlash(__('Se guardo el Afiliado con éxito', true));
			$this->Session->setFlash("It's ok!", "success");
			
			$this->redirect(array('action'=>'index'));
		} else {
			$this->Session->setFlash(__('El Afiliado no se pudo guardar. Por favor intente de nuevo.', true));
	
		}

    }  	
  }
  
  */
  
  public function edit($id){
    $this->Afiliado->id = $id;
    if (!$this->Afiliado->exists()) {
            throw new NotFoundException(__('Afiliado invalido'));
    }
    if ($this->request->is('get')) {
        $this->request->data = $this->Afiliado->read();

    } else {
        if ($this->Afiliado->save($this->request->data)) {
            //$this->Session->setFlash('Se modificó el Afiliado con éxito');
            $this->Session->setFlash("Se modificó el Afiliado con éxito", "success");			
            $this->redirect(array('action' => 'index'));
        } else {
        	$this->Session->setFlash("No se pudo modificar el Afiliado", "error");	
            //$this->Session->setFlash('No se pudo modificar el Afiliado.');
        }
    }  	
  }
  
  
  public function show($id){
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
            'conditions' => array('Localidad.departamento_id = Departamento.departamento and Departamento.provincia_id = 19 ')
        )    
		
    )
   ));	   
	      
	
   $afiliado = $this->Afiliado->find("first", array("conditions" => array("Afiliado.id" => $id), 
                                                    "contain" => array('Localidad', 'Departamento')
								                 )
				                 );
   $this->set('afiliado', $afiliado);	
	
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