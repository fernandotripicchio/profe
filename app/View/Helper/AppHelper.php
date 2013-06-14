<?php
/**
 * Application level View Helper
 *
 * This file is application-wide helper file. You can put all
 * application-wide helper-related methods here.
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
 * @package       app.View.Helper
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Helper', 'View');

/**
 * Application helper
 *
 * Add your application-wide methods in the class below, your helpers
 * will inherit them.
 *
 * @package       app.View.Helper
 */
class AppHelper extends Helper {
	
	function sexo($tipo_sexo){
		if ($tipo_sexo == "M") {
			return "Masculino";
		}
		
		if ($tipo_sexo == "F") {
			return "Femenino";
		}
	}
	
	function show_estado($estado) {
		if ($estado=="1") {
			return "<span class='activo'>ACTIVO<span>";
		} else {
			return "<span class='baja'>BAJA</span>";
		}
	}
	
	function show_estado_expediente($estado) {
		
		switch ($estado) {
			case '0':
				return "<span class='activo'>NUEVO<span>"; 
				break;
			case '1':
				return "<span class='activo'>EN PROCESO<span>"; 
				break;
			case '2':
				return "<span class='activo'>CERRADO<span>"; 
				break;
			case '3':
				return "<span class='baja'>ELIMINADO<span>"; 
				break;
		}
		
	}	
	
	function nro_pension( $afiliado ) {
		$nro_pension = $afiliado["Afiliado"]["clave_excaja"]."-".$afiliado["Afiliado"]["clave_tipo"] ."-".$afiliado["Afiliado"]["clave_numero"];
		$nro_pension.= "-".$afiliado["Afiliado"]["clave_coparticipe"]."-".$afiliado["Afiliado"]["clave_parentezco"];
		return $nro_pension;
	}	
}
