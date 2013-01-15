 <? 
 class LocalidadesController extends AppController {
  var $name = 'Localidades';
  public $helpers = array("Html","Form");
  var $components = array("RequestHandler");
  var $uses = array('Localidad');
  
  
  function beforeFilter() {
     $this->layout = "admin";
  }
  
  public function getLocalidades($departamento_id = 12){

     if($this->RequestHandler->isAjax()) {
         Configure::write('debug', 2);
         $this->layout = 'ajax';
         $localidades = $this->Localidad->find("all", array("conditions" => array("departamento_id" => $departamento_id),
                                                            "limit" => 10,
                                                            "recursive" => -1));
         $localidades = json_encode(compact('localidades'));
         $this->set(compact("localidades"));
     }
  } 
 }
 ?>