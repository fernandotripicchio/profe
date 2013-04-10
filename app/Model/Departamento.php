<?php class Departamento extends AppModel {
	public $name = 'Departamento';
	  
	public $belongsTo = array('Provincia' => array(
	                                          'className' => 'Provincia',
		                                      'foreignKey' => 'provincia'
								             ));		
	public $hasMany = array("Localidades" => array('foreignKey' => 'departamento'));
	    
    public $validate = array(
		        'nombre' => array(
		            'required' => array(
		                'rule' => array('notEmpty'),
		                'message' => 'Nombre es requerido'
	            ))
				);
  
  
	public function findDepartamento($departamento, $provincia = 19){
    	$departamento =  $this->find("first", array("conditions" => 
		                                              array("provincia" => $provincia,
															"departamento" => $departamento), 
		   	                                                "recursive" => -1) );
		return $departamento;
	 }  
	 
	 

 }