<? 
//Modulo para ver el historial del afiliado
 class ClinicasController extends AppController {
  var $name = 'Clinicas';
  public $helpers = array("Html","Form");
  var $components = array("RequestHandler");
  var $uses = array('Diagnostico', 'Afiliado', 'Clinica');
  public $paginate = array('limit' => 50);  

  
 public function getDiagnosticos() {
  	$diagnosticos = $this->Diagnostico->find("all", array("recursive" => -1));
	$new_diag = array();
	foreach ($diagnosticos as $diagnostico) {
		     $new_diag[$diagnostico["Diagnostico"]["id"]] = $diagnostico["Diagnostico"]["codigo"]." - ".$diagnostico["Diagnostico"]["nombre"] ;
	}	
    $diagnosticos = $new_diag;	
	$this->set(compact("diagnosticos"));	

   } 
  
 public function add($afiliado_id=false) {
	
	$this->getDiagnosticos();	
    if (!empty($this->data)) {
			$this->Clinica->create();
		
			if ($this->Clinica->save($this->data)) {
				$afiliado_id = $this->data["Clinica"]["afiliado_id"];
				$this->Session->setFlash('Se guardo el diagnostico con éxito', 'success');
				$this->redirect(array('controller' => 'afiliados', 'action'=>'historial', $afiliado_id));
			} else {
				$this->Session->setFlash("El diagnostico no se pudo guardar. Por favor intente de nuevo", "error");
       
			}
    } 	else {
         $afiliado = $this->Afiliado->find("first", array("conditions" => array("id" => $afiliado_id), "recursive" => -1));
         $this->set('afiliado', $afiliado);		    	
    }
 } // Del getPrestaciones()
	
	
	
	
	
public function edit($id = null) {
	$this->getPrestadores();
	$this->getPrestaciones();	
    		
    $this->Prestacion->id = $id;
    if ($this->request->is('get')) {
        $this->request->data = $this->Prestacion->read();
    } else {
			$data["Prestacion"] =  $this->request->data["Prestacion"];
			$data["Prestacion"]["fecha"] = $this->fechaSpanishDB($this->request->data["Prestacion"]["fecha"]);
    	
        if ($this->Prestacion->save($data)) {
            $this->Session->setFlash('La prestación se modificó con éxito', "success");
            $this->redirect(array('action' => 'index'));
        } else {
        	 $this->Session->setFlash("No se pudo modificar la prestación", "error");
        }
    }
    $prestacion = $this->Prestacion->read();
    $afiliado = $this->Afiliado->find("first", array("conditions" => array("id" => $prestacion["Prestacion"]["afiliado_id"] ), "recursive" => -1));
    $this->set('afiliado', $afiliado);			
}
  
  public function show($id){
    $this->Prestador->id = $id;
    if (!$this->Prestador->exists()) {
            throw new NotFoundException(__('Prestador invalido'));
    }  	
	
   $this->set('prestador', $this->Prestador->read());	
	
  }	
	
 }
?>