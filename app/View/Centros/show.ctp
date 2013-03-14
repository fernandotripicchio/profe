<?// print_r($afiliado)?>
<div class="show_table">
	<table>
		<caption>
			Datos del Centro
		</caption>
		<tr>
            <td class="with-4 right">Nombre: </td>
            <td class="left"><?php echo $centro["Centro"]["nombre"]?></td> 
		</tr>
		<tr>
			<td class="with-4 right">Dirección: </td>
			<td class="left"><?php echo $centro["Centro"]["direccion"]?></td>
		</tr>
		<tr>
			<td class="with-4 right">Telefonos: </td>
			<td class="left"><?php echo $centro["Centro"]["telefonos"]?></td>
		</tr>
		<tr>
			<td class="with-4 right">Localidad: </td>
			<td class="left"><?php echo $centro["Localidad"]["nombre"]?></td>
		</tr>
		

	</table>
   <div class="botonera">
        <?php echo $this->html->link('Volver',array("controller"=>"centros", "action" => "index"), array('class' => 'button'));?>
        <?php echo $this->html->link('Editar',array("controller"=>"centros", "action" => "edit", $centro["Centro"]["id"]), array('class' => 'button'));?>        
   </div>	
</div>