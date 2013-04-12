<?php
 class Diagnostico extends AppModel {
      public $name = 'Diagnostico';
	  public $hasMany = array('Clinicas');
	  
 }