<?echo $this->Html->script('expedientes/expedientes');?>

<div id="expediente_add">
    <?=$this->form->create('Expediente',array('action'=>'edit'), array("autocomplete" => "off"));?>
    <?=$this->form->input('id', array('type' => 'hidden'));?>    
    <?=$this->element("Expedientes/form", array("title"=>"Editar Expediente"));?>
    <div class="full center_image botonera">
       <?=$this->html->link('Listado','/expedientes/', array('class' => 'button btn-right'));?>    	
       <?=$this->form->submit("Guardar" , array('div' => false,'class' => 'button btn-right' ) )?>
    </div>    
    
    <?=$this->form->end();?>
</div> 