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
   
 /*
  * Funcion para obtener los departamentos de la provincia
 */
  
  
  public function getDepartamentos($provincia_id = 19) {
	  	$departamentos = $this->Departamento->find("all", 
	  	                                           array("conditions" => array( "provincia_id" => $provincia_id),
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
 
   public function getLocalidades($provincia_id = 19, $departamento_id) {
	  	$localidades = $this->Localidad->find("all", 
	  	                                           array("conditions" => array( "provincia_id" => $provincia_id, "departamento_id" => $departamento_id),
	  	                                                 "sort" => "Localidad.nombre ASC",
	  	                                                 "recursive" => -1
												        )
									              );
	    $new_localidades = array();
		
	    foreach ($localidades as $localidad) {
	      $new_localidades[$localidad["Localidad"]["id"]] = $localidad["Localidad"]["nombre"];
	    }
	    $localidades = $new_localidades;
	    $this->set(compact("localidades"));	
   } 
  
  
  
   public function getCentros($provincia_id = 19) {
	  	$centros = $this->Centro->find("all");
	    $new_centros = array();
	    foreach ($centros as $centro) {
	      $new_centros[$centro["Centro"]["id"]] = $centro["Centro"]["nombre"];
	    }
	    $centros = $new_centros;
	    $this->set(compact("centros"));	
   } 
  
	
}
