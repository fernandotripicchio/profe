<div id="carnet_afiliado">
    <?=$this->form->create('Afiliado',array('action'=>'carnet', 'id' => 'afiliadoCarnetForm'));?>
    <?=$this->element("Afiliados/carnet_form", array("title"=>"Afiliado Carnet"));?>
    <?=$this->Form->input('id', array('type' => 'hidden'));?>    
    <div class="full center_image botonera">
       <?=$this->form->submit("Guardar" , array('div' => false,'class' => 'button' ) )?>
       <?=$this->html->link('Imprimir','/afiliados/', array('class' => 'button'));?>       
       <?=$this->html->link('Volver','/afiliados/', array('class' => 'button'));?>
    </div>    
    <?=$this->form->end();?>
</div>