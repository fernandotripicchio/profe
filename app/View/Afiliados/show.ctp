<?// print_r($afiliado)?>
<div class="show_table">
	<table>
		<caption>
			Datos del Afiliado
		</caption>
		<tr>
         <td class="with-4 right">Nombre: </td>
         <td class="left"><?php echo $afiliado["Afiliado"]["nombre"]?></td> 
         <td class="with-4 right">Fecha Alta:</td>
	        <td class="left">
	                      <?php echo $this->Time->format('d/m/Y', $afiliado['Afiliado']['fecha_alta']); ?>
	        </td>
         
		</tr>
		<tr>
			<td class="with-4 right">Clave: </td>
			<td class="left" colspan="3"><?php echo $afiliado["Afiliado"]["clave_numero"]?></td>
		</tr>
		<tr>
			<td class="with-4 right">Documento: </td>
			<td class="left" ><?php echo $afiliado["Afiliado"]["tipo_documento"]." - ".$afiliado["Afiliado"]["documento"]?></td>
	        <td class=" width-4 right">Fecha Nacimiento: </td>
	        <td class="left" >
	                      <?php echo $this->Time->format('d/m/Y', $afiliado['Afiliado']['fecha_nacimiento']); ?>
	        </td>			
		</tr>
		
         <tr>
			<td class="with-4 right">Sexo: </td>
			<td class="left" colspan="3"><?php echo $this->Html->sexo($afiliado["Afiliado"]["sexo"])?></td>
		 </tr>
		 
         <tr>
			<td class="with-4 right">Ley Aplicada: </td>
			<td class="left" colspan="3"><?php echo $afiliado["Grupo"]["codigo"]." - ".$afiliado["Grupo"]["descripcion"]?></td>
		 </tr>
		 
          <tr>
	        <td class=" width-4 right">Incapacidad: </td>
			<td class="left" colspan="3"><?php echo $afiliado["Afiliado"]["incapacidad"] ?></td>
          </tr>	
          <tr>
          	<td class="width-4" colspan="4">Domicilio</td>
          </tr>
          <tr>
          	<td class="width-4 right">Calle</td>
          	<td class="left"><?php echo $afiliado["Afiliado"]["domicilio_calle"] ?></td>
          	<td class="width-4 right">Número:</td>
          	<td class="left"><?php echo $afiliado["Afiliado"]["domicilio_nro"] ?></td>
          </tr>
          <tr>
          	<td class="width-4 right">Piso</td>
          	<td class="left"><?php echo $afiliado["Afiliado"]["domicilio_piso"] ?></td>
          	<td class="width-4 right">Dpto:</td>
          	<td class="left"><?php echo $afiliado["Afiliado"]["domicilio_depto"] ?></td>
          </tr>
          <tr>
          	<td class="width-4 right">Localidad</td>
          	<td class="left"><?php echo $afiliado["Localidad"]["nombre"] ?></td>
          	<td class="width-4 right">Departamento:</td>
          	<td class="left"><?php echo $afiliado["Departamento"]["nombre"] ?></td>
          </tr>
	</table>
   <div class="botonera">
        <?php echo $this->html->link('Volver',array("controller"=>"afiliados", "action" => "index"), array('class' => 'button'));?>
   </div>	
</div>