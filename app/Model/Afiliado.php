<?php
 class Afiliado extends AppModel {
      public $name = 'Afiliado';
	  
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
            )) ,
        'tipo' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Tipo Documento es requerido'
            ))


       );
  
 }