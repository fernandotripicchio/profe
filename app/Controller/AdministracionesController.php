<?
 
 class UsuariosController extends AppController {
  var $name = 'Usuarios';
  public $helpers = array("Html","Form");
  var $components = array("RequestHandler");
  var $uses = array('Usuario');
  public $paginate = array(
                          'limit' => 50,
                               'order' => array(
                               'Usuario.nombre' => 'asc'
        )
    );
  function beforeFilter() {
     parent::beforeFilter();  	
     $this->layout = "admin";
  }
  

 
 }