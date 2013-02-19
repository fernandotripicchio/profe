<? 
 class UsuariosController extends AppController {
  var $name = 'Usuarios';
  public $helpers = array("Html","Form");
  var $components = array("RequestHandler");
  var $uses = array('Usuario');
  
  
  function beforeFilter() {
     //$this->layout = "admin";
	 parent::beforeFilter();
     $this->Auth->allow(array("logout", "login", "add", "index"));
  }
  
  

 function index() {
 	$this->layout = "admin";
	$usuarios = $this->paginate('Usuario');
    $this->set('usuarios', $usuarios);		
	
 	
 }
 
 
 public function login() {
    $this->layout = "login";

    if ($this->request->is('post')) {
    	
		        
        if ($this->Auth->login()) {       
            return $this->redirect(array("controller" => "afiliados", "action" => "index"));
        } else {
            $this->Session->setFlash(__('Usuario or password es incorrecto'), 'default', array(), 'auth');
        }
    }  
   
}
 
 public function logout() {
    $this->redirect($this->Auth->logout());
 }
 
 
 public function add() {
 	$this->layout = "admin";
    if (!empty($this->data)) {
			$this->Usuario->create();
			if ($this->Usuario->save($this->data)) {
				$this->Session->setFlash(__('Se guardo el usuario con éxito', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('El usurio no se pudo guardar. Por favor intente de nuevo.', true));
		        //$this->redirect(array('action'=>'add'));        
			}
    } 	
 } // Del add
 
  
 }
 
 
 ?>