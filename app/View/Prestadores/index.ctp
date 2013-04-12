<div id = "listado_afiliados" class="listados">
	<h1>Listado de Prestadores</h1>
	
	


  <div id="listado">
       <table class="list">
          <caption>Prestadores</caption>
          <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Empresa</th>
                <th scope="col">Nombre</th>                
                <th scope="col">Telefono</th>                
                <th scope="col">Documento</th>
                <th scope="col">Email</th>
                                
                <th>&nbsp;</th>             
            </tr>
        </thead>
            <!-- Here is where we loop through our $posts array, printing out post info -->
            <tbody>
            <?php foreach ($prestadores as $prestador): ?>
               <tr>
	                 <td class="left">

	                 	<?php echo $prestador['Prestador']['id'];      ?>
	                 </td>
	                 <td class="left">
	                    <?php echo $prestador['Prestador']['empresa']   ?>
 	                 </td>
	                 
	                 <td class="left">
	                    <?php echo $prestador['Prestador']['nombre']   ?>
 	                 </td>
	                 <td class="left">
	                    <?php echo $prestador['Prestador']['telefono']  ?>
	                 </td>
	                 <td class="left">
	                    <?php echo $prestador['Prestador']['documento']  ?>
	                 </td>
	                 
	                 <td class="left">
	                    <?php echo $prestador['Prestador']['email']     ?>	
	                 </td>
                 
                     <td>
                     	<?//php echo $this->html->link("Afiliados", array("controller" => "afiliados", "action" => "show", $afiliado['Afiliado']['id']))?>                     	
                     	<?php echo $this->html->link("Ver", array("controller" => "prestadores", "action" => "show", $prestador['Prestador']['id']))?>
                        <?php echo $this->html->link("Editar", array("controller" => "prestadores", "action" => "edit", $prestador['Prestador']['id']))?>	                 	
                     </td>	                 
	                 
            </tr>
            <?php endforeach; ?>
            </tbody>
          </table>
      </div>
      <div class="paging">
             <?php echo $this->Paginator->prev('<< '.__('Anteriores', true), array(), null, array('class'=>'off'));?>
             <?php echo $this->Paginator->numbers(array('tag' => 'div','separator' => ''));?>
             <?php echo $this->Paginator->next(__('Siguientes', true).' >>', array(), array(), array('class' => 'off'));?>
       </div>

	
</div>	