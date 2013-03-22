<? 
 class MedicosController extends AppController {
  var $name = 'Medicos';
  public $helpers = array("Html","Form");
  var $components = array("RequestHandler");
  var $uses = array('Centro', 'Localidad', 'Departamento', 'Medico');
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
    $medicos = $this->paginate('Medico');
    $this->set('medicos', $medicos);	 
     
  }
  
  

  
  
  public function show($id){
    $this->Centro->id = $id;
    if (!$this->Centro->exists()) {
            throw new NotFoundException(__('Centro invalido'));
    }  	
	
   $this->set('centro', $this->Centro->read());	
	
  }


 public function importar(){
    $cantidad_medicos = 0; 
    if (!empty($this->data))  {
    	    set_time_limit ( 3000 );
            $cantidad_medicos = $this->Medico->import($this->data['field']['tmp_name']);
            //$this->redirect('somecontroller/someaction');
    }	 
	 
	$this->set(compact("cantidad_medicos")); 
	   
  }
  
  
  public function getCentros($localidad_id ){

     //if($this->RequestHandler->isAjax()) {
         //Configure::write('debug', 2);
         $this->layout = 'ajax';

         $centros = $this->Centro->find("all", array("conditions" => array("localidad_id" => $localidad_id),
                                                            "order" => "Centro.nombre ASC",                                                            
                                                            "recursive" => -1));
         $centros = json_encode(compact('centros'));
         $this->set(compact("centros"));
     //}
  }   
  
  
  
  
  

 
 }