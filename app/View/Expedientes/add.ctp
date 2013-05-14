<?echo $this->Html->script('expedientes/expedientes');?>

<div id="expediente_add">
    <?=$this->form->create('Expediente',array('action'=>'add'), array("autocomplete" => "off"));?>
    <?=$this->element("Expedientes/form", array("title"=>"Nuevo Expediente"));?>

    <div class="full center_image botonera">
       <?=$this->html->link('Listado','/expedientes/', array('class' => 'button btn-right'));?>    	
       <?=$this->form->submit("Guardar" , array('div' => false,'class' => 'button btn-right' ) )?>
    </div>    
    <?=$this->form->end();?>    
    
</div> 