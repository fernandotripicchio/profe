<div id="user_add">
    <?=$this->form->create('Usuario',array('action'=>'edit'), array("autocomplete" => "off"));?>
    <?=$this->Form->input('id', array('type' => 'hidden'));?>
    <?=$this->element("Usuarios/form", array("title"=>"Editar Perfil"));?>
    <?=$this->form->end();?>
</div>  