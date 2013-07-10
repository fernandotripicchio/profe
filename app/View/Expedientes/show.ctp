<div class="show_expediente">
  	 <table>
  	 	 <tr>
  	 	 	<td class="width-4 th_header" colspan="2"> Datos del Afiliado </td>
  	 	 </tr>
		 <tr>
			<td class="with-4 right">Nro de Pensión: </td>
			<td class="left" > <?php echo $nro_pension?> </td>
		 </tr>        
		 <tr>
			<td class="with-4 right"> Nombre: </td>
			<td class="left" ><?php echo $expediente["Afiliado"]["nombre"] ?></td>
		 </tr>        
		 <tr>
			<td class="with-4 right"> Documento: </td>
			<td class="left" ><?php echo $expediente["Afiliado"]["tipo_documento"]." " .$expediente["Afiliado"]["documento"] ?></td>
		 </tr>        
		 	
	 </table>
	 <!-- Tabla con la informacion del expediente -->
  	 <table>
  	 	 <tr>
  	 	 	<td class="width-4 th_header" colspan="2"> Expediente </td>
  	 	 </tr>
		 <tr>
			<td class="with-4 right"> ID : </td>
			<td class="left" > <?php echo $expediente["Expediente"]["id"]  ?> </td>
		 </tr>
		 
		 <tr>
			<td class="with-4 right"> Fecha Inicio : </td>
			<td class="left" > <?php echo $expediente["Expediente"]["fecha_inicio"]  ?> </td>
		 </tr>        
		         
		 <tr>
			<td class="with-4 right"> Tipo: </td>
			<td class="left" ><?php echo $expediente["TipoExpediente"]["nombre"] ?></td>
		 </tr>        

		 
		 <tr>
			<td class="with-4 right"> Urgente: </td>
			<td class="left" > <?php echo ( $expediente['Expediente']['urgente']==1 ? "Si" : "No" );   ?> </td>
		 </tr>        
		 <tr>
			<td class="with-4 right"> Diagnostico: </td>
			<td class="left" > <?php echo $expediente['Diagnostico']['nombre'] ;   ?> </td>
		 </tr>        


		 <tr>
			<td class="with-4 right"> Presupuesto: </td>
			<td class="left" ><?php echo $this->html->money( $expediente["Expediente"]["presupuesto"] ) ?></td>
		 </tr>        


		 	
	 </table>	 
     <!-- Tabla con los archivos -->	 
	 <table>
	 	<tr>
	 	    <td class="width-4 th_header" > Archivos </td>	
	 	</tr>
	 	
        <tr>
		 	<td class="text-align-left">
		 		<?php echo $this->Upload->view('Expediente', $expediente['Afiliado']['id']); ?>
		 	</td>
		</tr> 
	 </table>
   <div class="botonera">
        <?php echo $this->html->link('Listado Afiliados',array("controller"=>"expedientes", "action" => "index"), array('class' => 'button btn-right'));?>
        <?php echo $this->html->link('Historial Afiliado',array("controller"=>"afiliados", "action" => "historial", $expediente['Afiliado']['id']), array('class' => 'button btn-right'));?>        
        <?php echo $this->html->link('Editar',array("controller"=>"expedientes", "action" => "edit", $expediente["Expediente"]["id"]), array('class' => 'button btn-right'));?>        
   </div>	
</div>