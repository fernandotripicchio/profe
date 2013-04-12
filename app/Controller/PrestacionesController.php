<? 
 class PrestacionesController extends AppController {
  var $name = 'Prestaciones';
  public $helpers = array("Html","Form");
  var $components = array("RequestHandler");
  var $uses = array('Prestacion', 'Afiliado', 'Prestador');
  public $paginate = array(
                          'limit' => 50,
                               'order' => array(
                               'Prestacion.nombre' => 'asc'
        )
    );
	
	
  public function index(){
    $prestaciones = $this->paginate('Prestacion');
    $this->set('prestaciones', $prestaciones);	 
  	
  }
  
 public function getPrestaciones(){
 	$prestaciones=array("Acompañante Terapeutico" => "Acompañante Terapeutico",
 	                     "Cuidador Domiciliario" => "Cuidador Domiciliario",
 	                     "Acompañante Terapeutico" => "Acompañante Terapeutico", 
 	                     "Transporte" => "Transporte", 
 	                     "Kinesiologia" => "Kinesiologia", 
 	                     "Apoyo Pedagogico" => "Apoyo Pedagogico");
    $this->set('prestaciones', $prestaciones);	
 }
  
 public function getPrestadores() {
  	$prestadores = $this->Prestador->find("all", array("recursive" => -1));
	$new_prestadores = array();
	foreach ($prestadores as $prestador) {
		     $new_prestadores[$prestador["Prestador"]["id"]] = $prestador["Prestador"]["nombre"] ;
	}	
    $prestadores = $new_prestadores;
	
	$this->set(compact("prestadores"));	

   } 
  
 public function add($afiliado_id=false) {
	$this->getPrestadores();
	$this->getPrestaciones();	
    if (!empty($this->data)) {
			$this->Prestacion->create();
		
			$data["Prestacion"] =  $this->data["Prestacion"];
			$data["Prestacion"]["fecha"] = $this->fechaSpanishDB($this->data["Prestacion"]["fecha"]);
			if ($this->Prestacion->save($data)) {
				$this->Session->setFlash('Se guardo la prestación con éxito', 'success');
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash("La prestación no se pudo guardar. Por favor intente de nuevo", "error");
       
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