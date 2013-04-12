<div id = "listado_afiliados" class="listados">
	<h1>Listado de Prestaciones</h1>
	
	


  <div id="listado">
       <table class="list">
          <caption>Prestaciones</caption>
          <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Afiliado Nombre</th>
                <th scope="col">Afiliado Documento</th>
                <th scope="col">Prestacion</th> 
                <th scope="col">Empresa</th>                     
                <th scope="col">Prestador</th>          
                <th scope="col">Fecha Inicio</th>                
                <th>&nbsp;</th>             
            </tr>
        </thead>
            <tbody>
            <?php foreach ($prestaciones as $prestacion): ?>
               <tr>
	                 <td class="left">
	                 	<?php echo $prestacion['Prestacion']['id'];      ?>
	                 </td>
	                 <td class="left">
	                    <?php echo $prestacion['Afiliado']['nombre']   ?>
 	                 </td>
	                 
	                 <td class="left">
	                    <?php echo $prestacion['Afiliado']['documento']   ?>
 	                 </td>
	                 <td class="left">
	                    <?php echo $prestacion['Prestacion']['nombre']   ?>
 	                 </td>
	                 <td class="left">
	                    <?php echo $prestacion['Prestador']['empresa']   ?>
 	                 </td>
	                 <td class="left">
	                    <?php echo $prestacion['Prestador']['nombre']   ?>
 	                 </td>
                 
                     <td>
                     	<?php echo $this->Time->format('d/m/Y', $prestacion['Prestacion']['fecha'] ); ?>
                     </td>
                     <td>
                     	<?//php echo $this->html->link("Ver", array("controller" => "prestadores", "action" => "show", $prestador['Prestador']['id']))?>
                        <?php echo $this->html->link("Editar", array("controller" => "prestaciones", "action" => "edit", $prestacion['Prestacion']['id']))?>	                 	
                     	
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