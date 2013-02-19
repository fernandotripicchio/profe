 <? 
 class LocalidadesController extends AppController {
  var $name = 'Localidades';
  public $helpers = array("Html","Form");
  var $components = array("RequestHandler");
  var $uses = array('Localidad', 'Departamento');
  
  
  function beforeFilter() {
  	 parent::beforeFilter();
     $this->layout = "admin";
  }
  
  public function getLocalidades($provincia_id, $departamento_id ){

     //if($this->RequestHandler->isAjax()) {
         //Configure::write('debug', 2);
         $this->layout = 'ajax';
		 $departamento = $this->Departamento->find("first", array("conditions" => array("Departamento.id" => $departamento_id), "recursive" => -1));
         $localidades = $this->Localidad->find("all", array("conditions" => array("provincia_id" => $provincia_id,"departamento_id" => $departamento["Departamento"]["departamento_id"]),                                                            
                                                            "recursive" => -1));
         $localidades = json_encode(compact('localidades'));
         $this->set(compact("localidades"));
     //}
  } 
 }
 ?>