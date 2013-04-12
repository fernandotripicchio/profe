
<div id="prestacion_add">
    <?=$this->form->create('Prestacion',array('action'=>'add'), array("autocomplete" => "off"));?>
    <?=$this->element("Prestaciones/form", array("title"=>"Nueva Prestacion"));?>
    <div class="full center_image botonera">

                     <?=$this->html->link('Listado','/afiliados/', array('class' => 'button'));?>
                     <?=$this->form->submit("Guardar" , array('div' => false,'class' => 'button' ) )?>                     
    </div>                     
    <?=$this->form->end();?>
</div>  