<!-- Formulario de Busqueda -->
<div id="formulario_afiliados">
	<?php echo $this->Form->create("keys") ?>
	<table>
		<tr>
			<td>				
				<?php echo $this->Form->input("keys", array("type" => "text", "size" => 30,"label" => "Datos a Buscar" )) ?>
			</td>
			<td>
				<?php echo $this->Form->submit("Buscar")?>
			</td>
		</tr>
	</table>
	<?php echo $this->Form->end; ?>
</div>


<div id = "listado_afiliados">
  <table class="list">
          <caption>Afiliados</caption>
          <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nombre</th>
                <th scope="col">Domicilio</th>
                <th scope="col">Documento</th>
                <th scope="col">Fecha Nacimiento</th>
                <th scope="col">Fecha Alta</th>
                <th scope="col">Localidad</th>
            </tr>
        </thead>
            <!-- Here is where we loop through our $posts array, printing out post info -->
            <tbody>
            <?php foreach ($afiliados as $afiliado): ?>
               <tr>
	                 <td class="left">
	                 	<?php echo $afiliado['Afiliado']['id'];      ?>
	                 </td>
	                 <td class="left">
	                    <?php echo $afiliado['Afiliado']['nombre']   ?>
 	                 </td>
	                 <td class="left">
	                    <?php echo $afiliado['Afiliado']['domicilio_calle'] ?>
	                 </td>
	                 <td>
	                    <?php echo $afiliado['Afiliado']['documento']  ?>
	                 </td>
	                 <td>
	                      <?php echo $this->Time->format('d/m/Y', $afiliado['Afiliado']['fecha_nacimiento']); ?>
	                 </td>
	                 <td>                      
	                    <?php echo $this->Time->format('d/m/Y', $afiliado['Afiliado']['fecha_alta']); ?>
	                 </td>
	                 
	                 <td class="left">
	                    <?php echo $afiliado['Localidad']['nombre']  ?>	
	                 </td>
            </tr>
            <?php endforeach; ?>
            </tbody>
            <tfoot>
            </tfoot>
       </table>
      <div class="paging">
      
             <?php echo $this->Paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'off'));?>
             <?php echo $this->Paginator->numbers(array('tag' => 'div','separator' => ''));?>
             <?php echo $this->Paginator->next(__('next', true).' >>', array(), array(), array('class' => 'off'));?>
             
      	<?// echo $this->Paginator->prev(' << ' . __('Anteriores'), array(), null, array('class' => 'off')); ?>
      	<?// echo $this->Paginator->numbers(array('first' => 'First page')); ?>
      	<?// echo $this->Paginator->next(' >> ' . __('Siguientes'), array(), null, array('class' => 'off ')); ?>
        
       </div>
