<?echo $this->Html->script('expedientes/expedientes');?>

<div id="expediente_add">
    <?=$this->form->create('Expediente',array('action'=>'add'), array("autocomplete" => "off"));?>
    <?=$this->element("Expedientes/form", array("title"=>"Nuevo Expediente"));?>
    <?=$this->form->end();?>
</div> 