<style type="text/css">
.fontCarnet{
	font-size: 0.8em;
}
.tableCarnet{
	width: 400px;
	border: 1px solid #000000;
}
</style>
<table  class="fontCarnet tableCarnet">
	    
		<tr>
			<td><?php echo strtoupper( $afiliado["Afiliado"]["nombre"] ) ?></td>
		</tr>
		<tr>
			<td><strong>Nro Pension:</strong> <?php echo $nro_pension ?></td>
		</tr>
		<tr>
			<td>
	            <strong> <?php echo $afiliado["Afiliado"]["tipo_documento"];?>: </strong>
	            <?php echo $afiliado["Afiliado"]["documento"];?>
			</td>
		</tr>	
		<tr>
			<td>
			  <strong>Fecha Nac.:</strong><?php echo $this->Time->format('d/m/Y', $afiliado["Afiliado"]["fecha_nacimiento"]); ?>
			</td>
		</tr>
		<tr>
			<td>
			<?php echo strtoupper( $afiliado["Centro"]["nombre"]); ?>
			</td>
		</tr>
		<tr>
			<td>
				<strong>Méd. de cab.:</strong><?php echo strtoupper( $afiliado["Afiliado"]["medico"] ) ?>
			</td>
		</tr>
		<tr>
			<td>
				<strong>Tel. de urgencia:</strong><?php echo $afiliado["Afiliado"]["medico_telefono"]?>
			</td>
		</tr>	
	<tr>
		<td>
			<strong>Dirección: </strong><?php echo $afiliado["Afiliado"]["domicilio_calle"]?> <?php echo $afiliado["Afiliado"]["domicilio_nro"]?>  
		</td>
	</tr>
	<tr>
		<td>
			<strong>Tel:</strong><?php echo $afiliado["Afiliado"]["telefonos"]?>  
			<strong>Localidad:</strong><?php echo $afiliado["Localidad"]["nombre"]?> 
		</td>
	</tr>
	<tr>
		<td>
			<strong>Depto</strong><?php echo $afiliado["Departamento"]["nombre"]?>   
		</td>
	</tr>
</table>