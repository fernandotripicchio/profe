<?echo $this->Html->script('/afiliado/afiliado');?>

<div id="afiliados_edit">
    <?=$this->form->create('Afiliado',array('action'=>'edit', 'type' => 'file', 'id' => 'afiliadoForm'));?>
    <?=$this->element("Afiliados/form", array("title"=>"Editar Afiliado"));?>
    <div class="full center_image botonera">
       <?=$this->html->link('Listado','/afiliados/', array('class' => 'button btn-right'));?>    	
       <?=$this->form->submit("Guardar" , array('div' => false,'class' => 'button btn-right' ) )?>
    </div>    
    <?=$this->form->end();?>
</div>  