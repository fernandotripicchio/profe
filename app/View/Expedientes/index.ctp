<!-- Formulario de Busqueda -->
<div id = "listado_expedientes" class="listados">
<h1>Listado de Expedientes</h1>
<div id="formulario_expedientes">
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


<div>
  <table class="list">
          <caption>Expedientes</caption>
          <thead>
            <tr>
            	<th scope="col">ID</th>
                <th scope="col">Urgente</th>            	
            	<th scope="col">Fecha Inicio</th>
                <th scope="col">Afiliado</th>
                <th scope="col">Nro de Expediente</th>                
                <th>&nbsp;</th>             
            </tr>
        </thead>
            <!-- Here is where we loop through our $posts array, printing out post info -->
            <tbody>
            <?php foreach ($expedientes as $expediente): ?>
               <tr>
	                 <td class="left">
	                 	<?php echo $expediente['Expediente']['id'];   ?>
	                 </td>
	                 <td class="left">
	                 	<?php echo ( $expediente['Expediente']['urgente']==1 ? "Si" : "No" );   ?>
	                 </td>
	                 
	                 <td class="left">
	                 	<?php echo $expediente['Expediente']['fecha_inicio'];   ?>
	                 </td>
	                 <td class="left">
	                    <?php echo $expediente["Afiliado"]["nombre"]?>
 	                 </td>               	
	                 <td class="left">
	                 	<?php echo $expediente['Expediente']['nro_expediente']; ?>
	                 </td>

                     <td>
                     	<?php echo $this->html->link("Ver", array("controller" => "expedientes", "action" => "show", $expediente['Expediente']['id']))?>
                        <?php echo $this->html->link("Editar", array("controller" => "expedientes", "action" => "edit", $expediente['Expediente']['id']))?>
                     </td>	                 
	                 
            </tr>
            <?php endforeach; ?>
            </tbody>
       </table>
      </div>
      <div class="paging">
             <?php echo $this->Paginator->prev('<< '.__('Anteriores', true), array(), null, array('class'=>'off'));?>
             <?php echo $this->Paginator->numbers(array('tag' => 'div','separator' => ''));?>
             <?php echo $this->Paginator->next(__('Siguientes', true).' >>', array(), array(), array('class' => 'off'));?>
       </div>