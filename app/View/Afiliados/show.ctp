<div class="show_table">
	<table>
        <tr>
          	<td class="width-4 th_header" colspan="4"> Datos del Afiliado </td>
        </tr>	
		<tr>
			<td class="with-4 right">Nro de Pensión: </td>
			<td class="left" colspan="3"><?php echo $nro_pension?></td>
		</tr>        	
		<tr>
         <td class="with-4 right">Nombre: </td>
         <td class="left"><?php echo $afiliado["Afiliado"]["nombre"]?></td> 
         <td class="with-4 right">Fecha Alta:</td>
	        <td class="left">
	                      <?php echo $this->Time->format('d/m/Y', $afiliado['Afiliado']['fecha_alta']); ?>
	        </td>
         
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
          	<td class="width-4 th_header" colspan="4">Domicilio</td>
          </tr>
          <tr>
          	<td class="width-4 right">Calle:</td>
          	<td class="left"><?php echo $afiliado["Afiliado"]["domicilio_calle"] ?></td>
          	<td class="width-4 right">Número:</td>
          	<td class="left"><?php echo $afiliado["Afiliado"]["domicilio_nro"] ?></td>
          </tr>
          <tr>
          	<td class="width-4 right">Piso:</td>
          	<td class="left"><?php echo $afiliado["Afiliado"]["domicilio_piso"] ?></td>
          	<td class="width-4 right">Dpto:</td>
          	<td class="left"><?php echo $afiliado["Afiliado"]["domicilio_depto"] ?></td>
          </tr>
          <tr>
          	<td class="width-4 right">Localidad:</td>
          	<td class="left"><?php echo $afiliado["Localidad"]["nombre"] ?></td>
          	<td class="width-4 right">Departamento:</td>
          	<td class="left"><?php echo $afiliado["Departamento"]["nombre"] ?></td>
          </tr>
          
          <tr>
          	<td class="width-4 th_header" colspan="4">Contacto</td>
          </tr>
          <tr>
          	<td class="width-4 right">Teléfonos:</td>
          	<td class="left"><?php echo $afiliado["Afiliado"]["telefonos"] ?></td>
          	<td class="width-4 right">Celular(s):</td>
          	<td class="left"><?php echo $afiliado["Afiliado"]["celular"] ?></td>
          </tr>
          <tr>
          	<td class="width-4 right">Email(s):</td>
          	<td class="left" colspan="3"><?php echo $afiliado["Afiliado"]["email"] ?></td>
          </tr>                    
          <tr>
          	<td class="width-4 th_header" colspan="4" > Centro de Salud      </td>
          </tr>          
          <tr>
          	<td class="width-4 right">Nombre</td>
          	<td class="left"> <?php echo $afiliado["Centro"]["nombre"] ?>   </td>
          	<td class="width-4 right">Direccion:</td>
          	<td class="left"><?php echo $afiliado["Centro"]["direccion"] ?> </td>
          	
          </tr>

      <table>
          <tr>
          	<td class="width-4 th_header" colspan="4"> Archivos </td>
          </tr>          
      	
		 <tr>
		 	<td>
		 		<?php echo $this->Upload->view('Afiliado', $afiliado['Afiliado']['id']); ?>
		 	</td>
		 </tr>         	

      </table>
      
       <table >
          <tr>
          	<td class="width-4 th_header" colspan="4"> Observaciones </td>
          </tr>          
  	        <tr>
                 <td class="last left">
                     <td class="left"><?php echo $afiliado["Afiliado"]["observaciones"] ?> </td>
                 </td>
              </tr>



       </table>      
      
           	

          
	</table>
   <div class="botonera">
        <?php echo $this->html->link('Listado',array("controller"=>"afiliados", "action" => "index"), array('class' => 'button btn-right'));?>
        <?php echo $this->html->link('Editar',array("controller"=>"afiliados", "action" => "edit", $afiliado["Afiliado"]["id"]), array('class' => 'button btn-right'));?>
        
   </div>	
</div>