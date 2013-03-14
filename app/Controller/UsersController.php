<? 
 class UsersController extends AppController {
  var $name = 'Usuarios';
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
  
  public function edit( $id ) {
	$this->Usuario->id = $id;		
	if (!$this->Usuario->exists()) {
	            throw new NotFoundException(__('Usuario invalido'));
	}
	if ($this->request->is('get')) {
	        $this->request->data = $this->Usuario->read();	
	} else {
	        if ($this->Usuario->save($this->request->data)) {
	            $this->Session->setFlash("Se modificó el Usuario con éxito", "success");			
	            $this->redirect(array("controller" => "Usuario", "action" => "show", $id));
	        } else {
	        	$this->Session->setFlash("No se pudo modificar el Usuario", "error");	
	        }
	}
	//Departamentos
	$usuario        = $this->Usuario->find("first", array("conditions" => array("Usuario.id" => $id)));
	$this->set('usuario', $this->Usuario->read());	
	
  }
    
 
  public function logout() {
    $this->redirect($this->Auth->logout());
  }
 }
 ?>