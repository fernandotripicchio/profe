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