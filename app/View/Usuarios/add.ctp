<?echo $this->Html->script('user');?>
<div id="user_add">
    <?=$this->form->create('Usuario',array('action'=>'add'), array("autocomplete" => "off"));?>
    <?=$this->element("Usuarios/form", array("title"=>"Nuevo Usuario"));?>
    <?=$this->form->end();?>
</div>  