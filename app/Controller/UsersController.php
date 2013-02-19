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
 
 public function logout() {
    $this->redirect($this->Auth->logout());
 }
 }
 ?>