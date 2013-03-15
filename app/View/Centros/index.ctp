<!-- Formulario de Busqueda -->
<div id = "listado_centros" class="listados">
<h1>Listado de Centros de Salud</h1>
<div id="formulario_centros">
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
          <caption>Centros</caption>
          <thead>
            <tr>
            	<th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Direccion</th>                
                <th scope="col">Telefonos</th>
                <th scope="col">Localidad</th>                                
                <th>&nbsp;</th>             
            </tr>
        </thead>
            <!-- Here is where we loop through our $posts array, printing out post info -->
            <tbody>
            <?php foreach ($centros as $centro): ?>
               <tr>
	                 <td class="left">
	                 	<?php echo $centro['Centro']['id'];      ?>
	                 </td>
               	
	                 <td class="left">
	                 	<?php echo $centro['Centro']['nombre'];      ?>
	                 </td>
	                 <td class="left">
	                    <?php echo $centro['Centro']['direccion']   ?>
 	                 </td>
	                 <td>
	                    <?php echo $centro['Centro']['telefonos']  ?>
	                 </td>
	                 <td class="left">
	                    <?php echo $centro['Localidad']['nombre']  ?>	
	                 </td>
                     <td>
                     	<?php echo $this->html->link("Ver", array("controller" => "centros", "action" => "show", $centro['Centro']['id']))?>
                        <?php echo $this->html->link("Editar", array("controller" => "centros", "action" => "edit", $centro['Centro']['id']))?>
 	                 	<?php echo $this->html->link("Afiliados", array("controller" => "centros", "action" => "edit", $centro['Centro']['id']))?>
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