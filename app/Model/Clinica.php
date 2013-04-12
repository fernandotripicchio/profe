<?php

 class Clinica extends AppModel {
  var $name = 'Clinica';

  public $belongsTo = array('Diagnostico', 'Afiliado');
   
}
?>