<div id="carnet_afiliado">
    <?php echo $this->form->create('Afiliado',array('action'=>'carnet', 'id' => 'afiliadoCarnetForm'));?>
    <?php echo $this->element("Afiliados/carnet_form", array("title"=>"Afiliación"  ));?>
    <?php echo $this->Form->input('id', array('type' => 'hidden'));?>  
    <div class="full center_image botonera">
       <?=$this->form->submit("Guardar" , array('div' => false,'class' => 'button btn-right' ) )?>       
       <?=$this->html->link('Volver','/afiliados/', array('class' => 'button btn-right'));?>
    </div>    
    <?php echo  $this->form->end();?>
</div>