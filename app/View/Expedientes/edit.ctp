<?php echo $this->Html->script('expedientes/expedientes');?>
<div id="expediente_add">
    <?php echo $this->form->create('Expediente',array('action'=>'edit'), array("autocomplete" => "off"));?>
    <?php echo $this->form->input('id', array('type' => 'hidden'));?>    
    <?php echo $this->element("Expedientes/form", array("title"=>"Editar Expediente"));?>
    <div class="full center_image botonera">
        <?php echo $this->html->link('Listado Expedientes','/expedientes/', array('class' => 'button btn-right'));?>  
        <?php echo $this->html->link('Listado Afiliados',array("controller"=>"expedientes", "action" => "index"), array('class' => 'button btn-right'));?>
        <?php echo $this->html->link('Historial Afiliado',array("controller"=>"afiliados", "action" => "historial", $expediente['Afiliado']['id']), array('class' => 'button btn-right'));?>      
        <?php echo $this->form->submit("Guardar" , array('div' => false,'class' => 'button btn-right' ) )?>
    </div>    
    <?php echo $this->form->end();?>
</div> 