<div id="prestacion_add">
    <?=$this->form->create('Clinica',array('action'=>'add'), array("autocomplete" => "off"));?>
    <?=$this->element("Clinicas/form", array("title"=>"Nuevo Diagnostico"));?>
    <div class="full center_image botonera">
           <?=$this->html->link('Listado','/afiliados/', array('class' => 'button'));?>
           <?=$this->form->submit("Guardar" , array('div' => false,'class' => 'button' ) )?>                     
    </div>                     
    <?=$this->form->end();?>
</div>  