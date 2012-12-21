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
  	 $afiliados = $this->Afiliados->find("all");
  }
  
  
  public function importar(){
  	 //App::import("Vendor","parsecsv.lib");
     if (!empty($this->data))  {
            $fileData = fread(fopen($this->data['field']['tmp_name'], "r"), 
                                     $this->data['field']['size']);
            //$this->data['field']['data'] = $fileData;
					
            //Agregar Codigo para parsear el CSV y poder ingresar los nuevos afiliados
            
            $this->Afiliado->import($fileData);
            //$this->redirect('somecontroller/someaction');
     }	 
	 
	   
  }
 
 }