<fieldset>  
  <legend><?php echo $title?> </legend>  
  <table class="full">
    <tbody>
        <tr>
          	<td class="width-4 th_header" colspan="4"> Datos del Afiliado </td>
        </tr>	             	
        <tr>
            <td class="right with-4">Apellido y Nombre:</td>
            <td class="last left">
                     <?php echo $afiliado["Afiliado"]["nombre"];?>
             </td>
        </tr>
        <tr>
            <td class="right with-4">Nro Pension:</td>
            <td class="last left"> <?php echo $nro_pension; ?>  </td>
         </tr>
         <tr>
            <td class="right with-4">Tipo y Nro. Documento:</td>
            <td class="last left">
                      	<?php echo $afiliado["Afiliado"]["tipo_documento"];?>
                      	<?php echo $afiliado["Afiliado"]["documento"];?>
             </td>
         </tr>
         <tr>
             <td class="right with-4">Fecha de Nacimiento:</td>
             <td class="last left">
                      	<?php echo $this->Time->format('d/m/Y', $afiliado["Afiliado"]["fecha_nacimiento"]); ?>
              </td>
         </tr>                                 
         <tr>
             <td class="right">Teléfono Contacto:</td>
             <td class="last left">
                     <?php echo $this->form->input('telefonos',    array('label'=> false,'type'=>'text', 'size'=>40, 'class' => 'required', 'div' => array('tag' => '')));?>
             </td>
         </tr>
         <tr>
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
      </table>
      <table class="full">
      	  <tr>
          	<td class="width-4 th_header" colspan="7"> Ubicación y Centro de Salud </td>
          </tr>
       	   <tr>
				<td> Domicilio:	</td>
				<td class="last left">	
					<?php echo $this->form->input('domicilio_calle',    array('label'=> false,'type'=>'text', 'size'=>40,  'div' => array('tag' => '')));?>
				</td>
				<td> Domicilio Nro: </td>
				<td class="last left">		
		             <?php echo $this->form->input('domicilio_nro',    array('label'=> false,'type'=>'text', 'size'=>2,  'div' => array('tag' => '')));?>
				</td>
         	</tr>
        	<tr>
  				<td>Departamento:</td>
				<td>					
			        <select name="data[Afiliado][departamento_id]" id="afiliadosFilterDepartamento" class="select-filter-afiliados">
			                 <option value="">Seleccione un Departamento</option>
                             <?php foreach($departamentos as $key=>$value) { ?>
                                   <option value="<?=$key?>" <?=(($afiliado["Afiliado"]["departamento_id"] == $key) ? "selected": "")?>><?=$value?></option>                             	
                             <?php } ?>
			        </select>					
				</td>
				<td>   Localidad: </td>
				<td colspan="3">					
			        <select name="data[Afiliado][localidad_id]" id="afiliadosFilterLocalidades" class="select-filter-afiliados">
			                 <option value="">Seleccione una Localidad</option>
                             <?php foreach($localidades as $key=>$value) { ?>
                                   <option value="<?=$key?>" <?=(($afiliado["Afiliado"]["localidad_id"] == $key) ? "selected": "")?>><?=$value?></option>                             	
                             <?php } ?>
			        </select>					
				</td>				
         	</tr>
       	<tr>
       		<td >Centro de Salud:</td>
		    <td>
   	            <select name="data[centros]" id="afiliadosFilterCentros" class="select-filter-afiliados">
			                 <option value="">Seleccione un Centro</option>
                             <?php foreach($centros as $key=>$value) { ?>
                                   <option value="<?=$key?>" <?=(($afiliado["Afiliado"]["centro_id"] == $key) ? "selected": "")?>><?=$value?></option>                             	
                             <?php } ?>
			    </select>					
		    </td>
			<td> Médico Cabecera:</td>
			<td class="last left">
					 <?php echo $this->form->input('medico',    array('label'=> false,'type'=>'text', 'size'=>40,  'div' => array('tag' => '')));?>
			</td>
   		    <td> Télefono Urgencia: </td>
			<td class="last left">
					 <?php echo $this->form->input('medico_telefono',    array('label'=> false,'type'=>'text', 'size'=>40,  'div' => array('tag' => '')));?>
			</td>
       	</tr>
       </table>
</fieldset>  