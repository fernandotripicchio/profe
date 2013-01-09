<?//echo $this->Html->script('cadete');?>
<div id="afiliados_edit">
    <?=$this->form->create('Afiliado',array('action'=>'edit', 'id' => 'afiliadoForm'));?>
    <?=$this->element("Afiliados/form", array("title"=>"Editar Afiliado"));?>
    <div class="full center_image botonera">
       <?=$this->form->submit("Guardar" , array('div' => false,'class' => 'button left' ) )?>
       <?=$this->html->link('Listado','/afiliados/', array('class' => 'button left'));?>
    </div>    
    <?=$this->form->end();?>
</div>  