<?echo $this->Html->script('prestador');?>
<div id="user_add">
    <?=$this->form->create('Prestador',array('action'=>'add'), array("autocomplete" => "off"));?>
    <?=$this->element("Prestadores/form", array("title"=>"Nuevo Prestdor"));?>
    <?=$this->form->end();?>
</div>  