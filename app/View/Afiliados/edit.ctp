<?echo $this->Html->script('/afiliado/afiliado');?>
	<table>
		<tr>
			<td>
              <?php echo $this->html->link('Historial',array("controller"=>"afiliados", "action" => "historial", $afiliado['Afiliado']['id']), array('class' => 'button btn-right'));?>				
              <?php echo $this->html->link('Nuevo Expediente',array("controller"=>"expedientes", "action" => "add", $afiliado['Afiliado']['id']), array('class' => 'button btn-right'));?>				
		      <?php echo $this->html->link('Nueva Prestación',array("controller"=>"prestaciones", "action" => "add", $afiliado['Afiliado']['id']), array('class' => 'button btn-right', 'target' => '_blank'));?>
         	  <?php echo $this->html->link('Nuevo Diagnostico',array("controller"=>"clinicas", "action" => "add", $afiliado['Afiliado']['id']), array('class' => 'button btn-right','target' => '_blank'));?>		      				
				
			</td>
		</tr>
	</table>

<div id="afiliados_edit">
    <?=$this->form->create('Afiliado',array('action'=>'edit', 'type' => 'file', 'id' => 'afiliadoForm'));?>
    <?=$this->element("Afiliados/form", array("title"=>"Editar Afiliado"));?>
    <div class="full center_image botonera">
       <?=$this->html->link('Listado','/afiliados/', array('class' => 'button btn-right'));?>    	
       <?=$this->form->submit("Guardar" , array('div' => false,'class' => 'button btn-right' ) )?>
    </div>    
    <?=$this->form->end();?>
</div>  