<?echo $this->Html->script('prestador');?>
<div id="prestador_edit">
    <?=$this->form->create('Prestador',array('action'=>'edit'), array("autocomplete" => "off"));?>
    <?=$this->element("Prestadores/form", array("title"=>"Editar Prestador"));?>
    <div class="full center_image botonera">
       <?=$this->form->submit("Guardar" , array('div' => false,'class' => 'button' ) )?>
       <?=$this->html->link('Volver','/prestadores/', array('class' => 'button'));?>
    </div>      
    <?=$this->form->end();?>
</div>  
