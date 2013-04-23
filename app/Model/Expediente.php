<?php
 class Expediente extends AppModel {
      public $name = 'Expediente';
	  
	  
	  public $belongsTo = array("Afiliado"); 
	  
      public $validate = array(
        'fecha_inicio' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Fecha Inicio es requerido'
            )),
        'afiliado_id' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Afiliado es requerido'
            )) ,
       );
  
 }