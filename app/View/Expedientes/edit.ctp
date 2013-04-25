<?echo $this->Html->script('expedientes');?>

<div id="expediente_add">
    <?=$this->form->create('Expediente',array('action'=>'edit'), array("autocomplete" => "off"));?>
    <?=$this->form->input('id', array('type' => 'hidden'));?>    
    <?=$this->element("Expedientes/form", array("title"=>"Editar Expediente"));?>
    <?=$this->form->end();?>
</div> 