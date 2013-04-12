<? 
 class ReportesController extends AppController {
  var $name = 'Reportes';
  public $helpers = array("Html","Form");
  var $components = array("RequestHandler", 'Session');
  var $uses = array('Afiliado', 'Provincia' ,'Departamento', 'Localidad', 'Centro');
  public $paginate = array(
                          'limit' => 50,
                               'order' => array('Afiliado.nombre' => 'asc')
                           );
	
	
  function beforeFilter() {
  	 parent::beforeFilter();
     $this->layout = "admin";
  }
  
  
  public function index() {  
	$filtros =  array("Todos" => "Todos", "Afiliado.nombre" => "Nombre", "Afiliado.documento" => "Documento");
	$condition = "";
	
    //Set Session variables
    if ($this->request->is('post') ) {
     	            if ($this->params["data"]["keys"]["submit_action"] == "reset") {
     	            	 $reportesSession = $this->resetForm();
     	            }  else { 
	                    if (isset($this->params["data"]["keys"])) {
					         $this->Session->write('Reportes.keys', strtoupper( $this->params["data"]["keys"]["keys"] ));
							 $this->Session->write('Reportes.filters', $this->params["data"]["filters"]);
	 						 $this->Session->write('Reportes.departamentos', $this->params["data"]["departamentos"]);
	 						 $this->Session->write('Reportes.localidades', $this->params["data"]["localidades"]);
							 $this->Session->write('Reportes.centros', $this->params["data"]["centros"]);
	                         $reportesSession = $this->Session->read("Reportes");                          
	                    } else {
	                        die("Error en la busqueda");
	                    }
					}
     } else {
         $reportesSession = $this->Session->read("Reportes");
         if (!isset($reportesSession)){
              $reportesSession = $this->resetForm();   
         }
     }     

   
   $condition .= $this->buildCondition( strtoupper( $reportesSession["keys"] ) , $reportesSession["filters"] , $filtros);
   
   if (!empty( $reportesSession["departamentos"] )) {
			$condition .= " and Afiliado.departamento_id = ". $reportesSession["departamentos"];
    }

   if (!empty( $reportesSession["localidades"] )) {
			$condition .= " and Afiliado.localidad_id = ". $reportesSession["localidades"];
    }

   if (!empty( $reportesSession["centros"] )) {
			$condition .= " and Afiliado.centro_id = ". $reportesSession["centros"];
    }

	
    $afiliados = $this->paginate('Afiliado', $condition);
	$this->getDepartamentos(19);	
	$this->getLocalidades(19,$reportesSession["departamentos"]);
	$this->getCentrosByCodigo(19,$reportesSession["departamentos"] ,$reportesSession["localidades"]);
	
	//Hasta ACA
	$this->set('reportesSession', $reportesSession);
    $this->set('afiliados', $afiliados);	 
	$this->set('filtros', $filtros);	
	


	 
  }
  
 
  public function resetForm(){
     $this->Session->write('Reportes.keys', false );
	 $this->Session->write('Reportes.filters',false);
     $this->Session->write('Reportes.departamentos', false);
 	 $this->Session->write('Reportes.localidades',false);
	 $this->Session->write('Reportes.centros', false);
     $reportesSession = $this->Session->read("Afiliados");
     return $reportesSession;
  }
   
  
  
 public function buildCondition($keyword, $filters, $filtros) {
  	$initial_conditions = "Afiliado.activo = 1 ";
  	$conditions = "";
	if ( $filters  == "Todos") {		
   	    $conditions .=  $this->all_condition($filtros, $keyword);
	} else {
	   	$conditions .= $this->sql_condition($filters, $keyword);
	}
	if (!empty( $conditions )) {
		$initial_conditions = $initial_conditions . " and " . $conditions;
	}
   	return $initial_conditions;
  }
 
 
  ///////////////////////////////////////////////////////////////////////////////////////////////////////
  //     FUNCTION para SQL
  ///////////////////////////////////////////////////////////////////////////////////////////////////////
  
  public function sql_condition($key, $keyword, $operator = ' and' ) {
  	  $condition = ""; 
      switch ($key) {
			case 'Afiliado.nombre':							  
				  $condition = " $key like \"%$keyword%\" $operator";
			      break;
		   case 'Afiliado.documento':						  
		  	      $condition = " $key like \"%$keyword%\" $operator";
				  break;
		   case 'Departamento.id':
		  	      $condition = " $key = $keyword $operator";
				  break;
		   case 'Localidad.id':
		  	      $condition = " $key = $keyword $operator";
				  break;				  
		   case 'Centro.id':
		  	      $condition = " $key = $keyword $operator";
				  break;
	   }
	  
      $condition = $this->cleanCondition("and", $condition);
      return $condition;
  }   
 }
 
 
 ?>