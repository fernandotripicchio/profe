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
	 
     if( $this->RequestHandler->isAjax() ) {
         $new_localidades = array();
         $this->layout = 'ajax';
		 $localidades = $this->Localidad->getLocalidadesLocation($provincia_id, $departamento_id);
         $localidades = json_encode(compact('localidades'));
     }	 
	 $this->set(compact("localidades"));
  } // getLocalidades 
 }
 ?>