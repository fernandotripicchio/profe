    <fieldset>  
        <legend><?php echo $title?> </legend>  
        <table class="full">
             <tbody>
			    <tr>
					<td class="with-4 right">Nro de Pensión: </td>
					<td class="left">
						 <?php echo $nro_pension?>
					 </td>
				</tr>
             	
                <tr >
                 <td class="right with-4">Nombre:</td>
                 <td class="last left">
                     <?php echo $afiliado["Afiliado"]["nombre"] ?>
                 </td>
                </tr>
             	
				
				 <tr>
				    <td class=" width-4 right">Fecha Alta: </td>
			        <td class="left" >
			             <?php echo $this -> Time -> format('d/m/Y', $afiliado['Afiliado']['fecha_alta']); ?>
			        </td>			
				</tr>
				 				
				<tr>
					<td class="with-4 right">Documento: </td>
					<td class="left" ><?php echo $afiliado["Afiliado"]["tipo_documento"]." - ".$afiliado["Afiliado"]["documento"]?></td>
				</tr>
				<tr>	
			        <td class=" width-4 right">Fecha Nacimiento: </td>
			        <td class="left" >
			            <?php echo $this -> Time -> format('d/m/Y', $afiliado['Afiliado']['fecha_nacimiento']); ?>
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
            <td class="left"><?php echo $afiliado["Departamento"]["nombre"] ?></td>
          </tr> 
                
          <tr>
                   <td class="right">Teléfono Contacto:</td>
                   <td class="last left">
                     <?php echo $this->form->input('telefonos',    array('label'=> false,'type'=>'text', 'size'=>40, 'class' => 'required', 'div' => array('tag' => '')));?>
                   </td>
                </tr>
               
               <tr >
                 <td class="right">Celular(es):</td>
                 <td class="last left">
                     <?php echo $this->form->input('celular',    array('label'=> false,'type'=>'text', 'size'=>40,  'div' => array('tag' => '')));?>
                 </td>
               </tr>
               <tr>
                 <td class="right">Email(s):</td>
                 <td class="last left">
                     <?php echo $this->form->input('email',    array('label'=> false,'type'=>'text', 'size'=>40,  'div' => array('tag' => '')));?>
                 </td>
           </tr>
          <tr>
               <td colspan="2">   
                 	<hr />    
               </td>
          </tr>
         </tbody> 
      </table>
      <table>
         <tbody>
	       	<tr>
	      		<th colspan="6">
	        		   Centro de Salud 
	             </th>
	         </tr>
	         <tr>  
	            <td> Departamento </td>
	            <td>
	               <?php echo $this->form->select('departamento_id', $departamentos, array("class" => "", "value" => $afiliado["Afiliado"]["departamento_id"], "empty" => "Seleccione un Departamento")) ?>
	            </td>
	            <td> Localidad  </td>
                <td>
                   	 <?php echo $this->form->select('localidad_id', $localidades, array("class" => "", "value" => $afiliado["Afiliado"]["localidad_id"],  "empty" => "Seleccione una Localidad")) ?>
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
      <table>
		 <tr>
		 	<td>
		 		<?php echo $this->Upload-> edit('Afiliado', $afiliado['Afiliado']['id'], false); ?>
		 	</td>
		 </tr>         	

      </table>
       <table class="full">
	       	<tr>
	      		<th >
	        		   Observaciones 
	             </th>
	         </tr>       	
  	        <tr>
                 <td class="last left">
                     <?php echo $this->form->input('observaciones',    array('label'=> false,'type'=>'textarea', 'style' => 'width:99%', 'div' => array('tag' => '')));?>
                 </td>
              </tr>



       </table>      
      
    </fieldset>  