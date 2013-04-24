<div class="show_expediente">
  	 <table>
         <tr>
          	<td class="width-4 th_header" colspan="2"> Expediente </td>
         </tr>	
		 <tr>
			<td class="with-4 right">Nro de Pensión: </td>
			<td class="left" colspan="3"><?php echo "s"?></td>
		 </tr>        
		 <tr>
			<td class="with-4 right">Afiliado Nombre: </td>
			<td class="left" colspan="3"><?php echo $expediente["Afiliado"]["nombre"] ?></td>
		 </tr>        
		 <tr>
			<td class="with-4 right">Afiliado Documento: </td>
			<td class="left" colspan="3"><?php echo $expediente["Afiliado"]["documento"] ?></td>
		 </tr>        
		 <tr>
			<td class="with-4 right">Afiliado Nro de Pensión: </td>
			<td class="left" colspan="3"><?php echo "s" ?></td>
		 </tr>        
		 	
	 </table>
   <div class="botonera">
        <?php echo $this->html->link('Listado',array("controller"=>"expedientes", "action" => "index"), array('class' => 'button btn-right'));?>
        <?php echo $this->html->link('Editar',array("controller"=>"expedientes", "action" => "edit", $expediente["Expediente"]["id"]), array('class' => 'button btn-right'));?>        
   </div>	
</div>