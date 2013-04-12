<div id="prestacion_edit">
    <?=$this->form->create('Prestacion',array('action'=>'edit'), array("autocomplete" => "off"));?>
    <?=$this->element("Prestaciones/form", array("title"=>"Editar Prestacion"));?>
    <div class="full center_image botonera">
       <?=$this->form->submit("Guardar" , array('div' => false,'class' => 'button btn-right' ) )?>
       <?=$this->html->link('Listado','/prestaciones/', array('class' => 'button btn-right'));?>
    </div>      
    <?=$this->form->end();?>
</div>  
