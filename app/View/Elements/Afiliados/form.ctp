    <fieldset>  
        <legend><?php echo $title?> </legend>  
        <table class="full">
             <tbody>
                <tr >
                 <td class="right with-4">Nombre:</td>
                 <td class="last left">
                     <?php echo $this->form->input('nombre',    array('label'=> false,'type'=>'text', 'size'=>30, 'class' => 'required', 'div' => array('tag' => '')));?>
                 </td>
                </tr>
             	
			    <tr>
					<td class="with-4 right">Clave: </td>
					<td class="left">
						 <?php echo $afiliado["Afiliado"]["clave_numero"]?>
					 </td>
				</tr>
				
				 <tr>
				    <td class=" width-4 right">Fecha Alta: </td>
			        <td class="left" >
			             <?php echo $this->Time->format('d/m/Y', $afiliado['Afiliado']['fecha_alta']); ?>
			        </td>			
				</tr>
				 				
				<tr>
					<td class="with-4 right">Documento: </td>
					<td class="left" ><?php echo $afiliado["Afiliado"]["tipo_documento"]." - ".$afiliado["Afiliado"]["documento"]?></td>
				</tr>
				<tr>	
			        <td class=" width-4 right">Fecha Nacimiento: </td>
			        <td class="left" >
			            <?php echo $this->Time->format('d/m/Y', $afiliado['Afiliado']['fecha_nacimiento']); ?>
			        </td>			
				</tr>             	
               
               
	
		
         <tr>
			<td class="with-4 right">Sexo: </td>
			<td class="left" ><?php echo $this->Html->sexo($afiliado["Afiliado"]["sexo"])?></td>
		 </tr>
		 
         <tr>
			<td class="with-4 right">Ley Aplicada: </td>
			<td class="left" ><?php echo $afiliado["Grupo"]["codigo"]." - ".$afiliado["Grupo"]["descripcion"]?></td>
		 </tr>
		 
          <tr>
	        <td class=" width-4 right">Incapacidad: </td>
			<td class="left" ><?php echo $afiliado["Afiliado"]["incapacidad"] ?></td>
          </tr>	               
               
          <tr>
          	<td class="with-4 right">Localidad</td>
          	<td class="left">
          	   <?php echo $afiliado["Localidad"]["nombre"]?>	
          	</td>
          </tr>     

          <tr>
          	<td class="with-4 right">Departamento</td>
            <td class="left"><?php echo $departamento["Departamento"]["nombre"] ?></td>
          </tr> 
                
          <tr>
             <td class="right">Teléfonos:</td>
             <td class="last left">
                     <?php echo $this->form->input('telefonos',    array('label'=> false,'type'=>'text', 'size'=>30, 'class' => 'required', 'div' => array('tag' => '')));?>
             </td>
          </tr>
          <tr >
                 <td class="right">Celular:</td>
                 <td class="last left">
                     <?php echo $this->form->input('telefono_celular',    array('label'=> false,'type'=>'text', 'size'=>30,  'div' => array('tag' => '')));?>
                 </td>
          </tr>
          <tr>
                 <td class="right">Email:</td>
                 <td class="last left">
                     <?php echo $this->form->input('email',    array('label'=> false,'type'=>'text', 'size'=>30,  'div' => array('tag' => '')));?>
                 </td>
          </tr>
          <tr>
                 <td colspan="2">   
                 	<hr />    
                 </td>
          </tr>
      </table>
              <table>
              	<tr>
              		<th colspan="6">
              		   Centro de Salud 
              	     </th>
                 </tr>
                 <tr>  
                   <td>
                     Departamento	
                   </td>
                   <td>
                   <?php echo $this->form->select('departamento', $departamentos, array("class" => "", "value" => $departamento["Departamento"]["id"], "empty" => "Seleccione un Departamento")) ?>
                   </td>
                   <td>
                   	Localidad
                   </td>
                   <td>
                   	 <?php echo $this->form->select('localidad_id', $localidades, array("class" => "",  "empty" => "Seleccione una Localidad")) ?>
                   </td>
                   <td>	
                    Centros
                   </td>   
                   <td>
                   	 <?php echo $this->form->select('centro_id', $centros, array("class" => "", "empty" => "Seleccione un Centro")) ?>
                   </td>
                   
                               	
               </tr>                
               
             </tbody>

           </table>
    </fieldset>  