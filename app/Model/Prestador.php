<?php
 class Prestador extends AppModel {
      public $name = 'Prestador';
	  
	  public $hasMany = array("Prestaciones");
      public $validate = array(
        'nombre' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Nombre es requerido'
            )),
        'documento' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Documento es requerido'
            ))          
            
       );
  
 }