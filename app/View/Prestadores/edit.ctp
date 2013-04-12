<?echo $this->Html->script('prestador');?>
<div id="prestador_edit">
    <?=$this->form->create('Prestador',array('action'=>'edit'), array("autocomplete" => "off"));?>
    <?=$this->element("Prestadores/form", array("title"=>"Editar Prestador"));?>
    <div class="full center_image botonera">
       <?=$this->form->submit("Guardar" , array('div' => false,'class' => 'button btn-right' ) )?>
       <?=$this->html->link('Listado','/prestadores/', array('class' => 'button btn-right'));?>
    </div>      
    <?=$this->form->end();?>
</div>  
