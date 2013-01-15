<!-- Formulario de Busqueda -->
<div id = "listado_reportes" class="listados">
	<h1>Reportes</h1>
	<div id="formulario_reportes">
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


</div>