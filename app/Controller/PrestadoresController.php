<? 
 class PrestadoresController extends AppController {
  var $name = 'Prestadores';
  public $helpers = array("Html","Form");
  var $components = array("RequestHandler");
  var $uses = array('Prestador');
  public $paginate = array(
                          'limit' => 50,
                               'order' => array(
                               'Prestador.nombre' => 'asc'
        )
    );
	
	
  public function index(){
    $prestadores = $this->paginate('Prestador');
    $this->set('prestadores', $prestadores);	 
  	
  }
  
 public function add() {
    if (!empty($this->data)) {
			$this->Prestador->create();
			if ($this->Prestador->save($this->data)) {
				$this->Session->setFlash('Se guardo el prestador con éxito', 'success');
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash("El usuario no se pudo guardar. Por favor intente de nuevo", "error");
		        //$this->redirect(array('action'=>'add'));        
			}
    } 	
 } // Del add  
	
 }
?>