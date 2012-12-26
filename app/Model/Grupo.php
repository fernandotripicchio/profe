<?php
 class Grupo extends AppModel {
      public $name = 'Grupo';
	  
	  
	  public $hasMany = array("Afiliados"); 
	  
      public $validate = array(
        'nombre' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Nombre es requerido'
            )),
        'codigo' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Codigo es requerido'
            )) ,
       );
  
 }