<?//echo $this->Html->script('cadete');?>
<div id="centros_edit">
    <?=$this->form->create('Centro',array('action'=>'edit', 'id' => 'centroForm'));?>
    <?=$this->Form->input('id', array('type' => 'hidden'));?>    
    <?=$this->element("Centros/form", array("title"=>"Editar Centro"));?>
    <div class="full center_image botonera">
         <?=$this->form->submit("Guardar" , array('div' => false,'class' => 'button left' ) )?>
         <?=$this->html->link('Volver','/centros/', array('class' => 'button left'));?>
    </div>                    
    <?=$this->form->end();?>
</div>  