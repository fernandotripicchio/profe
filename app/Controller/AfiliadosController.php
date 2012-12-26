<?
 
 class AfiliadosController extends AppController {
  var $name = 'Afiliados';
  public $helpers = array("Html","Form");
  var $components = array("RequestHandler");
  var $uses = array('Afiliado');
  var $paginate = array('limit' => 50,'order' => array('Afiliado.id' => 'asc'));
  
    
  function beforeFilter() {
     $this->layout = "admin";
  }
  
  
  public function index(){
  	 $afiliados = $this->Afiliado->find("all");
  }
  
  
  public function importar(){
  	 //App::import("Vendor","parsecsv.lib");
     if (!empty($this->data))  {

            //$this->data['field']['data'] = $fileData;
					
            //Agregar Codigo para parsear el CSV y poder ingresar los nuevos afiliados
            
            $this->Afiliado->import($this->data['field']['tmp_name']);
            //$this->redirect('somecontroller/someaction');
     }	 
	 
	   
  }
 
 }