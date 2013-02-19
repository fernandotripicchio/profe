<?php
 App::uses('AuthComponent', 'Controller/Component');
 class Usuario extends AppModel {
  public $name = 'Usuario';
	  
  public $validate = array(
        'email' => array(
                    'required' => array(
                             'rule' => array('notEmpty'),
                             'message' => 'Email es requerido'
                     ),
                    'unique' => array(
                              'rule' => 'isUnique',
                               'message' => 'Ya existe un usuario con ese email.'
                     )),
         'password' => array(
                    'required' => array(
                              'rule' => array('notEmpty'),
                               'message' => 'Debe ingresar un password'
                      ),
                    'min' => array(
                              'rule' => array('minLength', 8),
                               'message' => 'Password debe tener al menos 8 caracteres.'
                     )),

        'password_confirm' => array(
                    'rule' => array('checkPasswords'),
                    'message' => 'Los passwords no coinciden'
                     ),
        'nombre' => array(
                     'required' => array(
                              'rule' => array('notEmpty'),
                              'message' => 'Nombre es requerido'
                              )),
        'apellido' => array(
                     'required' => array(
                              'rule' => array('notEmpty'),
                              'message' => 'Apellido es requeridos'
                      ))
        );
  
  
  
   public function beforeSave() {
   	       if (isset($this->data[$this->alias]['password'])) {
                  $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
          }
           if (isset($this->data['Usuario']['password_confirm'])){
                  unset($this->data['Usuario']['password_confirm']);
            }
           return true;
   }
   
  function checkPasswords($data) {
        if($this->data['Usuario']['password'] !== $data['password_confirm']) {
            return false;
        }else {
            return true;
        }
   }   



 }