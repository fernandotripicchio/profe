    <fieldset>  
        <legend><?php echo $title?> </legend>  
        <table class="full">
             <tbody>
                <tr >
                 <td class="right with-4">Nombre:</td>
                 <td class="last left">
                     <?php echo $this->form->input('nombre',    array('label'=> false,'type'=>'text', 'size'=>30, 'class' => 'required', 'disabled' => true,'div' => array('tag' => '')));?>
                 </td>
                </tr>
             	
		
          <tr>
             <td class="right">Teléfonos:</td>
             <td class="last left">
                     <?php echo $this->form->input('telefono_particular',    array('label'=> false,'type'=>'text', 'size'=>30, 'class' => 'required', 'div' => array('tag' => '')));?>
             </td>
          </tr>
          <tr >
                 <td class="right">Celulares:</td>
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
                 <td class="right">Observaciones:</td>
                 <td class="last left">
                     <?php echo $this->form->input('observaciones',    array('label'=> false,'type'=>'textarea', 'cols' => 40 , 'div' => array('tag' => '')));?>
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
  				<td><label for="keysKeys">Departamento</label></td>
				<td>					
			        <select name="data[departamentos]" id="afiliadosFilterDepartamento" class="select-filter-afiliados">
			                 <option value="">Seleccione un Departamento</option>
                             <?php foreach($departamentos as $key=>$value) { ?>
                                   <option value="<?=$key?>" <?=(($afiliado["Afiliado"]["departamento"] == $key) ? "selected": "")?>><?=$value?></option>                             	
                             <?php } ?>
			        </select>					
				</td>
				<td>
				   <label for="keysKeys">Localidad</label>	
				</td>
				<td>					
			        <select name="data[localidades]" id="afiliadosFilterLocalidades" class="select-filter-afiliados">
			                 <option value="">Seleccione una Localidad</option>
                             <?php foreach($localidades as $key=>$value) { ?>
                                   <option value="<?=$key?>" <?=(($afiliado["Afiliado"]["localidad_id"] == $key) ? "selected": "")?>><?=$value?></option>                             	
                             <?php } ?>
			        </select>					
				</td>				
				<td>
					<label for="keysKeys">Centros</label>
				</td>

				<td>
					
			        <select name="data[centros]" id="afiliadosFilterCentros" class="select-filter-afiliados">
			                 <option value="">Seleccione un Centro</option>
                             <?php foreach($centros as $key=>$value) { ?>
                                   <option value="<?=$key?>" <?=(($afiliado["Afiliado"]["centro_id"] == $key) ? "selected": "")?>><?=$value?></option>                             	
                             <?php } ?>
			        </select>					
				</td>	      		
         	</tr>
       </table>
    </fieldset>  