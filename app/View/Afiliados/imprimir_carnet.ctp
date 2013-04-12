<style type="text/css">
.fontCarnet{
	font-size: 0.8em;
}
.tableCarnet{
	width: 330px;
	border: 1px solid #000000;
}
</style>
<table  class="fontCarnet tableCarnet">
	<tr>
		<td><?php echo $afiliado["Afiliado"]["nombre"]?></td>
	</tr>
	<tr>
		<td><strong>Nro Pension:</strong> <?php echo $nro_pension ?></td>
	</tr>
	<tr>
		<td>
            <?php echo $afiliado["Afiliado"]["tipo_documento"];?>
            <?php echo $afiliado["Afiliado"]["documento"];?>
		</td>
	</tr>	
	<tr>
		<td>
		  <strong>Fecha Nac:</strong><?php echo $this->Time->format('d/m/Y', $afiliado["Afiliado"]["fecha_nacimiento"]); ?>
		</td>
	</tr>
	<tr>
		<td>
		<?php echo $afiliado["Centro"]["nombre"]?>
		</td>
	</tr>
	<tr>
		<td>
			<strong>Méd. de cab.</strong><?php echo $afiliado["Afiliado"]["medico"]?>
		</td>
	</tr>
	<tr>
		<td>
			<strong>Tel. de urgencia</strong><?php echo $afiliado["Afiliado"]["medico_telefono"]?>
		</td>
	</tr>	
<tr>
	<td>
		<strong>Dirección</strong><?php echo $afiliado["Afiliado"]["domicilio_calle"]?> <?php echo $afiliado["Afiliado"]["domicilio_nro"]?>  
	</td>
</tr>
<tr>
	<td>
		<strong>Tel</strong><?php echo $afiliado["Afiliado"]["telefonos"]?>   
	</td>
</tr>
<tr>
	<td>
		<strong>Depto</strong><?php echo $afiliado["Departamento"]["nombre"]?>   
	</td>
</tr>
	<!--
	«ApeNom»
Nº de pensión «Clave_ExCaja»-«Clave_Tipo»-«Clave_Numero»-«Clave_Coparticipe»-«Clave_Parentesco»-«LeyAplicada»
 «Tipo_Doc»  «Numero_Doc»                 
Fecha Nac.«FeNac»         
«Hospital»
Méd. de cab. «Medico»               
Tel. de urgencia   «Urgencia»          
Dirección   «Dom_Calle»«Dom_Nro»       
Tel  «Tel_Particular»    Localidad  «Localidad1»
Dpto: «DEPTO»
-->   
</table>