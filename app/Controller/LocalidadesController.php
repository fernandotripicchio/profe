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
     $localidades = array();
     $new_localidades = array();
     $localidades = $this->Localidad->getLocalidadesLocation($provincia_id, $departamento_id);
     if( $this->RequestHandler->isAjax() ) {
     	 $this->layout = 'ajax';
		 $localidades = json_encode(compact('localidades'));
	 }
	 	 
	 $this->set(compact("localidades"));
  } // getLocalidades
  
   
 }
 ?>