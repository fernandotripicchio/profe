<?echo $this->Html->script('/afiliado/afiliado');?>

<div id="afiliados_edit">
    <?=$this->form->create('Afiliado',array('action'=>'edit', 'type' => 'file', 'id' => 'afiliadoForm'));?>
    <?=$this->element("Afiliados/form", array("title"=>"Editar Afiliado"));?>
    <div class="full center_image botonera">
       <?=$this->form->submit("Guardar" , array('div' => false,'class' => 'button' ) )?>
       <?=$this->html->link('Volver','/afiliados/', array('class' => 'button'));?>
    </div>    
    <?=$this->form->end();?>
</div>  