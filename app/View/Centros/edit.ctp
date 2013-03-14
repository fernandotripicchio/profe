<?//echo $this->Html->script('cadete');?>
<div id="centros_edit">
    <?=$this->form->create('Centro',array('action'=>'edit', 'id' => 'centroForm'));?>
    <?=$this->Form->input('id', array('type' => 'hidden'));?>    
    <?=$this->element("Centros/form", array("title"=>"Editar Centro"));?>
    <?=$this->form->end();?>
</div>  