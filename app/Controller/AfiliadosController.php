<?
 class AfiliadosController extends AppController {
  var $name = 'Afiliados';
  public $helpers = array("Html","Form");
  var $components = array("RequestHandler");
  var $uses = array('Afiliados');
  var $paginate = array('limit' => 50,'order' => array('Afiliado.id' => 'asc'));
  
    
  function beforeFilter() {
     $this->layout = "admin";
  }
  
  
  function index(){
  	
  }
  
  
  function importar(){
  	
  }
 
 }