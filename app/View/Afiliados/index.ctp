<!-- Formulario de Busqueda -->
<? $params_paginator = $this->Paginator->params() ?>
<div id = "listado_afiliados" class="listados">
	<h1>Listado de Afiliados</h1>
	<div id="formulario_afiliados">
		<?php echo $this->Form->create("keys", array("afiliadoSearchForm")) ?>
		<?php echo $this->Form->hidden('submit_action', array("id" => 'submit_action', 'value' => "")); ?>
		<table>
			<tr>
				<td><label for="keysKeys">Buscar por</label></td>
				<td class="with-4">				
					<?php echo $this->Form->input("keys", array("type" => "text", "size" => 30,"value" => $afiliadosSession["keys"],"label" => false )) ?>
				</td>
				<td><label for="keysKeys">Filtros</label></td>
				<td>					
					<?php echo $this->form->select('filters', $filtros,  array("class" => "select-filter-afiliados", "empty" => false)) ?>
  			    </td>

				<td><label for="keysKeys">Activos</label></td>
				<td>					
					<?php echo $this->form->select('filtros_activos', $filtros_activos,  array("class" => "select-filter-afiliados-activos", "empty" => false)) ?>
  			    </td>  			           
				<td>								
					<?php echo $this->Form->submit("Buscar", array("class" => "btn-form"))?>    
					<?php echo $this->Form->submit("Limpiar", array("class" => "btn-form", "id" => "buttonReset"))?>                    				
			    </td>			    
			</tr>
		</table>
		<?php echo $this->Form->end; ?>
	</div>

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
</div>