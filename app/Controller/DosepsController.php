<? 

 class DosepsController extends AppController {
  var $name = 'Doseps';
  public $helpers = array("Html","Form");
  var $components = array("RequestHandler");
  var $uses = array('Afiliado', "Dosep");
  
  public $paginate = array(
                          'limit' => 50,
                               'order' => array('Dosep.nombre' => 'asc')
                           );
  
  function beforeFilter() {
  	 parent::beforeFilter();
     $this->layout = "admin";
  }
    
  
  public function index() {	
     $afiliados = $this->paginate('Dosep');
     $this->set('afiliados', $afiliados);	      
  }	
  
  

 public function importar(){
    $cantidad_afiliados = 0; 
    if (!empty($this->data))  {
    	     
    	    set_time_limit ( 3000 );
            $cantidad_afiliados = $this->Dosep->importar($this->data['field']['tmp_name']);
            //$this->redirect('somecontroller/someaction');
    }	 
	 
	$this->set(compact("cantidad_afiliados")); 
	   
  }
   
 }
?>