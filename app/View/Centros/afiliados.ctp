 <div id="listado">
    	<div>
    		<strong>
    			Cantidad de Afiliados: <?= $params_paginator["count"] ?>
    		</strong>
    	</div>
       <table class="list" >
          <caption>Afiliados</caption>
          <thead>
            <tr>
            	<th scope="col">Activo</th>
                <th scope="col">Clave</th>
            	<th scope="col">Tipo</th>                
                <th scope="col">Nombre</th>                
                <th scope="col">Documento</th>
                <th scope="col">Departamento</th>                              
                <th scope="col">Localidad</th>
                <th scope="col">Centro de Salud</th>   
                <th>&nbsp;</th>             
            </tr>
        </thead>
            <tbody>
            <?php foreach ($afiliados as $afiliado): ?>
               <tr>
	                 <td class="left">
	                 	<?php echo $this->html->show_estado($afiliado['Afiliado']['activo']);      ?>
	                 </td>                 
               	
	                 <td class="left">
	                 	<?php echo $this->HTML->nro_pension($afiliado);?>
	                 </td>
	                 
	                 <td class="left">
	                 	<?php echo $this->html->show_tipo($afiliado['Afiliado']['clave_parentezco']);      ?>
	                 </td>
	                 
	                 <td class="left">
	                    <?php echo $afiliado['Afiliado']['nombre']   ?>
 	                 </td>
	                 <td class="left">
	                    <?php echo $afiliado['Afiliado']['tipo_documento']."  ".$afiliado['Afiliado']['documento']  ?>
	                 </td>
	                 <td class="left">
	                    <?php echo $afiliado['Departamento']['nombre']  ?>	
	                 </td>
	                 
	                 <td class="left">
	                    <?php echo $afiliado['Localidad']['nombre']  ?>	
	                 </td>
	                 <td class="left">
	                    <?php echo $afiliado['Centro']['nombre']  ?>
	                 </td>	                 
                     <td class="left">
                     	<?php echo $this->html->link("Ver", array("controller" => "afiliados", "action" => "show", $afiliado['Afiliado']['id']))?>
                     	<? if ($afiliado['Afiliado']['activo']) { ?>
                        	<?php echo $this->html->link("Editar", array("controller" => "afiliados", "action" => "edit", $afiliado['Afiliado']['id']))?>
                        <? } ?>                        	                 	
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