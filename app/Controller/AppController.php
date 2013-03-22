<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
   
   public $components = array('RequestHandler',
                              'Auth',
                              'Session');   
   
   
   
   public function beforeFilter() {
          $this->Auth->authenticate = array(
                             'Form' => array(
                                 'userModel' => 'Usuario',
                                 'fields' => array('username' => 'email')
                              ));
          
          $this->Auth->loginAction = array( 'controller' => 'usuarios', 'action' => 'login');
          $this->Auth->loginRedirect = array('controller' => 'afiliados', 'action' => 'index');
		  $this->set('nombre_usuario', $this->Auth->User("email"));
		  $this->set('id_usuario', $this->Auth->User("id"));
   }  
 /*
  * Funcion para obtener los departamentos de la provincia
 */
  
  
  public function getDepartamentos($provincia_id = 19) {
	  	$departamentos = $this->Departamento->find("all", 
	  	                                           array("conditions" => array( "provincia" => $provincia_id),
	  	                                                 "sort" => "Departamento.nombre ASC",
	  	                                                 "recursive" => -1
												        )
									              );
	    $new_departamentos = array();
	    foreach ($departamentos as $departamento) {
	      $new_departamentos[$departamento["Departamento"]["id"]] = $departamento["Departamento"]["nombre"];
	    }
	    $departamentos = $new_departamentos;
	    $this->set(compact("departamentos"));	
  }
 
 /*
  * Funcion para obtener las localidades de ese departamento y de esa provincia pasadas como parametros
  * 
 */ 
 
   public function getLocalidades($provincia_id = 19, $departamento_id =  false) {
   	    $new_localidades = array();
		
		//Si no esta vacio retorno departamento
		if (!empty($departamento_id)) { 
			  	$localidades = $this->Localidad->find("all", 
			  	                                           array("conditions" => array( "provincia" => $provincia_id, "departamento" => $departamento_id),
			  	                                                 "sort" => "Localidad.nombre ASC",
			  	                                                 "recursive" => -1
														        )
											              );
			    
				
			    foreach ($localidades as $localidad) {
			      $new_localidades[$localidad["Localidad"]["id"]] = $localidad["Localidad"]["nombre"];
			    }
		}
	    $localidades = $new_localidades;
	    $this->set(compact("localidades"));	
   } 
  
  
  
   public function getCentros($provincia_id = 19, $departamento = false, $localidad =  false) {
	    $new_centros = array();
		if (empty($departamento) && empty($localidad)) {   	
	  	    $centros = $this->Centro->find("all", array("sort" => "Centro.nombre ASC"));
		}
		elseif ( !empty($departamento) ) {
			$centros = $this->Centro->find("all" ,  array("sort" => "Centro.nombre ASC"));			
		} elseif ( !empty($localidad)) {
			$centros = $this->Centro->find("all",  array("sort" => "Centro.nombre ASC"));
		}

	    foreach ($centros as $centro) {
	         $new_centros[$centro["Centro"]["id"]] = $centro["Centro"]["nombre"];
	    }
	    $centros = $new_centros;
	    $this->set(compact("centros"));	
   } 
   
   
   
  
  public function all_condition($filtros, $keyword) {
  	   $condition = "";
	   
	   
  	   foreach ($filtros as $key => $keyvalue) {
  	   	    
	       $condition .= $this->sql_condition($key, $keyword, " or");		  
	   }
  	  
	   //Limpio el ultimo or si es necesario
	   // $char = "or";
       // $pattern = "/[#{$char}]+$/i";
       // $replacement = '';
       // $condition = preg_replace($pattern, $replacement, $condition);
       $condition = $this->cleanCondition("or", $condition);
       $condition = "(". $condition.")";
	   return $condition;
  }
  
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
		  	      $condition = " $key = \"%$keyword%\" $operator";
				  break;
			   	  
	   }
	  
      $condition = $this->cleanCondition("and", $condition);
      return $condition;
  }   
  
  public function cleanCondition($char, $condition){
   	   //$char = "and";
       $pattern = "/[#{$char}]+$/i";
       $replacement = '';
       $cond = preg_replace($pattern, $replacement, $condition); 
	   return $cond;	
  }
	 
	
}
