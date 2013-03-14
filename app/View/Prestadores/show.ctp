<?// print_r($afiliado)?>
<div class="show_table">
	<table>
		<caption>
			Datos del Prestador
		</caption>
		<tr>
            <td class="with-4 right">Nombre: </td>
            <td class="left"><?php echo $prestador["Prestador"]["nombre"]?></td> 
		</tr>
		<tr>
			<td class="with-4 right">Documento: </td>
			<td class="left"><?php echo $prestador["Prestador"]["documento"]?></td>
		</tr>
		<tr>
			<td class="with-4 right">Email: </td>
			<td class="left"><?php echo $prestador["Prestador"]["email"]?></td>
		</tr>
		
		<tr>
			<td class="with-4 right">Observaciones: </td>
			<td class="left"><?php echo $prestador["Prestador"]["observaciones"]?></td>
		</tr>
		

	</table>
   <div class="botonera">
        <?php echo $this->html->link('Volver',array("controller"=>"prestadores", "action" => "index"), array('class' => 'button'));?>
        <?php echo $this->html->link('Editar',array("controller"=>"prestadores", "action" => "edit", $prestador["Prestador"]["id"]), array('class' => 'button'));?>        
   </div>	
</div>