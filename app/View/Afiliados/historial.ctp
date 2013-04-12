<div class="show_table">
	
	<table>
		<tr>
			<td>
              <h3>Historial Afiliado</h3>				
			</td>
			<td>
		      <?php echo $this->html->link('Nueva Prestacion',array("controller"=>"prestaciones", "action" => "add", $afiliado['Afiliado']['id']), array('class' => 'button btn-right', 'target' => '_blank'));?>
         	  <?php echo $this->html->link('Nueva Diagnostico',array("controller"=>"clinicas", "action" => "add", $afiliado['Afiliado']['id']), array('class' => 'button btn-right','target' => '_blank'));?>
         	  		      				
			</td>
		</tr>
		
	</table>	
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
	        <td class=" width-4 right">Incapacidad: </td>
			<td class="left" colspan="3"><?php echo $afiliado["Afiliado"]["incapacidad"] ?></td>
          </tr>	
     </table>    
      <table>
          <tr>
          	<td class="width-4 th_header" colspan="5"> Prestaciones </td>
          </tr>
          <tr>
          	<td class="with-1"> ID </td>
          	<td class="with-5"> Prestación </td>
          	<td> Empresa </td>
          	<td> Prestador </td>
          	<td> Fecha Inicio </td>
          </tr> 
          <? foreach ($prestaciones as $prestacion) {        	?>
            <tr>
             	<td><?php echo $prestacion["Prestacion"]["id"] ?> </td>
             	<td><?php echo $prestacion["Prestacion"]["nombre"] ?> </td>
             	<td><?php echo $prestacion["Prestador"]["empresa"] ?> </td>
                <td><?php echo $prestacion["Prestador"]["nombre"] ?> </td>
                <td> <?php echo $this->Time->format('d/m/Y', $prestacion["Prestacion"]["fecha"]); ?> </td>
             </tr>
              
         <? } ?>

      </table>
      
      <table>
          <tr>
          	<td class="width-4 th_header" colspan="5"> Diagnosticos </td>
          </tr>
          <tr>
          	<td class="with-1"> ID </td>
          	<td class="with-2"> Codigo </td>
          	<td> Diagnostico </td>
          </tr> 
          <? foreach ($clinicas as $clinica) {        	?>
            <tr>
             	<td><?php echo $clinica["Clinica"]["id"] ?> </td>
             	<td><?php echo $clinica["Diagnostico"]["codigo"] ?> </td>
             	<td><?php echo $clinica["Diagnostico"]["nombre"] ?> </td>
             </tr>
              
         <? } ?>
      </table>              

   <div class="botonera">
        <?php echo $this->html->link('Volver',array("controller"=>"afiliados", "action" => "show", $afiliado['Afiliado']['id']), array('class' => 'button btn-right'));?>
   </div>	
</div>