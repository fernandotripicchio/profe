<div id="user_add">
    <?=$this->form->create('Usuario',array('action'=>'edit'), array("autocomplete" => "off"));?>
    <?=$this->element("Usuarios/form", array("title"=>"Editar Usuario"));?>
    <?=$this->form->end();?>
</div>  