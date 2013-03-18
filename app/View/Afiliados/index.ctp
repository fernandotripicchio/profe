<!-- Formulario de Busqueda -->
<div id = "listado_afiliados" class="listados">
	<h1>Listado de Afiliados</h1>
	<div id="formulario_afiliados">
		<?php echo $this->Form->create("keys") ?>
		<table>
			<tr>
				<td class="with-4">				
					<?php echo $this->Form->input("keys", array("type" => "text", "size" => 30,"value" => $afiliadosSession["keys"],"label" => "Datos a Buscar" )) ?>
				</td>
				<td>
					<label for="keysKeys">Buscar por</label>
					<?php echo $this->form->select('filters', $filtros,  array("empty" => false)) ?>
  			    </td>                
				<td>
					<label for="keysKeys">Departamento</label>
			        <select name="data[departamentos]">
			                 <option value="0"></option>
                             <?php foreach($departamentos as $key=>$value) { ?>
                                   <option value="<?=$key?>" <?=(($afiliadosSession["departamentos"] == $key) ? "selected": "")?>><?=$value?></option>                             	
                             <?php } ?>
			        </select>					
				</td>
				<td>
					<?php echo $this->Form->submit("Buscar")?>
				</td>
				<td>	
					<?php echo $this->Form->submit("Limpiar")?>
				</td>
			</tr>
		</table>
		<?php echo $this->Form->end; ?>
	</div>

    <div id="listado">
       <table class="list">
          <caption>Afiliados</caption>
          <thead>
            <tr>
                <th scope="col">Clave</th>
                <th scope="col">Nombre</th>                
                <th scope="col">Documento</th>
                <th scope="col">Fecha Nacimiento</th>
                <th scope="col">Fecha Alta</th>  
                <th scope="col">Departamento</th>                              
                <th scope="col">Localidad</th>
                <th scope="col">Centro de Salud</th>   
                <th>&nbsp;</th>             
            </tr>
        </thead>
            <!-- Here is where we loop through our $posts array, printing out post info -->
            <tbody>
            <?php foreach ($afiliados as $afiliado): ?>
               <tr>
	                 <td class="left">
	                 	<?php echo $afiliado['Afiliado']['clave_numero'];      ?>
	                 </td>
	                 <td class="left">
	                    <?php echo $afiliado['Afiliado']['nombre']   ?>
 	                 </td>
	                 <td class="left">
	                    <?php echo $afiliado['Afiliado']['tipo_documento']."  ".$afiliado['Afiliado']['documento']  ?>
	                 </td>
	                 <td>
	                      <?php echo $this->Time->format('d/m/Y', $afiliado['Afiliado']['fecha_nacimiento']); ?>
	                 </td>
	                 <td>                      
	                    <?php echo $this->Time->format('d/m/Y', $afiliado['Afiliado']['fecha_alta']); ?>
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
                     <td>
                     	<?php echo $this->html->link("Ver", array("controller" => "afiliados", "action" => "show", $afiliado['Afiliado']['id']))?>
                        <?php echo $this->html->link("Editar", array("controller" => "afiliados", "action" => "edit", $afiliado['Afiliado']['id']))?>
                        <?php echo $this->html->link("Carnet", array("controller" => "afiliados", "action" => "carnet", $afiliado['Afiliado']['id']))?>                        	                 	
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