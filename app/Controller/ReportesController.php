<? 
 class ReportesController extends AppController {
  var $name = 'Reportes';
  public $helpers = array("Html","Form");
  var $components = array("RequestHandler");
  var $uses = array('Localidad', 'Afiliados');
  
  
  function beforeFilter() {
     $this->layout = "admin";
  }
  
 function index(){
 	
 } 
 }
 
 
 ?>