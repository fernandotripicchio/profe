<div id="carnet_afiliado">
    <?php echo $this->form->create('Afiliado',array('action'=>'carnet', 'id' => 'afiliadoCarnetForm'));?>
    
<div class="show_table">
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
                   <td class="last left">
                     <?php echo $nro_pension; ?>
                   </td>
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
                   	<?php echo $afiliado["Afiliado"]["telefonos"];?>
                   </td>
                </tr>
               
               <tr>
                 <td class="right">Celular(es):</td>
                 <td class="last left">
                     <?php echo $afiliado["Afiliado"]["celular"];?>
                 </td>
               </tr>
               <tr>
                 <td class="right">Email(s):</td>
                 <td class="last left">
                    <?php echo $afiliado["Afiliado"]["email"];?>
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
				<td>
				   Domicilio:	
				</td>
				<td class="last left">		
				    <?php echo $afiliado["Afiliado"]["domicilio_calle"];?>
				</td>
				<td>
				   Domicilio Nro:	
				</td>
				<td class="last left">		
				    <?php echo $afiliado["Afiliado"]["domicilio_nro"];?>
				</td>
				
         		
         	</tr>          
        	<tr>
  				<td>Departamento:</td>
				<td class="last left">
					<?php echo $afiliado["Departamento"]["nombre"];?>					
				</td>
				<td>
				   Localidad:	
				</td>
				<td class="last left" colspan="3">
                    <?php echo $afiliado["Localidad"]["nombre"];?>										
				</td >
								

         	</tr>
       	<tr>
       		<td >Centro de Salud:</td>
				<td class="last left">
                 <?php echo $afiliado["Centro"]["nombre"];?>					
				</td>
				<td>
					Médico Cabecera:
				</td>
				<td class="last left">
					 <?php echo $afiliado["Afiliado"]["medico"];?>
				</td>
				<td>
					Télefono Urgencia:
				</td>
				
				<td class="last left">
                   <?php echo $afiliado["Afiliado"]["medico_telefono"];?>
				</td>
				
       	</tr>
     	
         	
       </table>
       
       <table class="full">
  	        <tr>
                 <td class="right with-4">Observaciones:</td>
                 <td class="last left">
                     <?php echo $afiliado["Afiliado"]["observaciones"];?>
                 </td>
              </tr>



       </table>  
    <?php echo $this->Form->input('id', array('type' => 'hidden'));?>  
    <div class="full center_image botonera">
       <?php echo $this->html->link("Editar", array("controller" => "afiliados", "action" => "carnet", $afiliado['Afiliado']['id']), array('class' => 'button btn-right'))?>                        	                 	
       <?php echo $this->html->link('Imprimir','/afiliados/imprimir_carnet/'.$afiliado["Afiliado"]["id"], array('class' => 'button btn-right', 'target' => '_blank'));?>
       <?php echo $this->html->link('Volver',  '/afiliados/', array('class' => 'button btn-right'));?>
    </div>    
    <?php echo  $this->form->end();?>
</div>