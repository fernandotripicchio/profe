<?echo $this->Html->script('prestador');?>
<div id="prestador_edit">
    <?=$this->form->create('Prestador',array('action'=>'edit'), array("autocomplete" => "off"));?>
    <?=$this->element("Prestadores/form", array("title"=>"Editar Prestador"));?>
    <?=$this->form->end();?>
</div>  
