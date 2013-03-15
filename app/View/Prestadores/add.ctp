<?echo $this->Html->script('prestador');?>
<div id="user_add">
    <?=$this->form->create('Prestador',array('action'=>'add'), array("autocomplete" => "off"));?>
    <?=$this->element("Prestadores/form", array("title"=>"Nuevo Prestador"));?>
    <div class="full center_image botonera">
                     <?=$this->form->submit("Guardar" , array('div' => false,'class' => 'button' ) )?>
                     <?=$this->html->link('Listado','/prestadores/', array('class' => 'button'));?>
    </div>                     
    <?=$this->form->end();?>
</div>  