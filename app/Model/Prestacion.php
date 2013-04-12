<?php
 class Prestacion extends AppModel {
      public $name = 'Prestacion';
      public $belongsTo = array("Prestador" => array(
	                                 'foreignKey' => 'prestador_id'
	                            ),
	                            "Afiliado" => array(
	                                 'foreignKey' => 'afiliado_id'
								)       
							 );	  	  
      public $validate = array(
        'nombre' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Nombre es requerido'
            )),
            
       );
	   
	   
	   function dateFormat($prestacion, $date){
	   	
	   }
  
 }