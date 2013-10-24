<!-- Formulario de Busqueda -->
<?php echo $this->Html->script('expedientes/expedientes');?>
<?php echo  $params_paginator = $this->Paginator->params() ?>
<div id = "listado_expedientes" class="listados">
<h1>Listado de Expedientes</h1>
<div id="formulario_expedientes">
	<?php echo $this->Form->create("keys", array("id" => "expedienteSearchForm")) ?>
    <?php echo $this->Form->hidden('submit_action', array("id" => 'submit_action', 'value' => "")); ?>	
	<table>
		<tr>
            <td><label for="keysKeys">Buscar por</label></td>			
			<td class="with-4">				
				<?php echo $this->form->input("keys", array("type" => "text", "size" => 30,"label" => false , "value" => $expedientesSession["keys"])) ?>
			</td>
  		    <td><label for="keysKeys">Estado</label></td>
			<td>					
				<?php echo $this->form->select('estados_expedientes', $estados_expedientes,  array("class" => "select-filter-expedientes", "empty" => false)) ?>
  			</td>
			
  		    <td><label for="keysKeys">Filtros</label></td>
			<td>					
				<?php echo $this->form->select('filters', $filtros,  array("class" => "select-filter-expedientes","value" => $expedientesSession["filters"], "empty" => false)) ?>
  			</td>
			<td>
				<?php echo $this->Form->submit("Buscar", array("class" => "btn-form"))?>
                <?php echo $this->Form->submit("Limpiar", array("class" => "btn-form", "id" => "buttonResetExpedientes"))?> 				
			</td>
		</tr>
	</table>
	<?php echo $this->Form->end; ?>
</div>

<div id="listado_expedientes">
    <div>
       <strong>	Cantidad de Expedientes: <?=$params_paginator["count"] ?>		</strong>
    </div>	
    <table class="list">
          <caption>Expedientes</caption>
          <thead>
            <tr>
            	<th scope="col" class="with-1">ID </th>
                <th scope="col">Estado            </th>
				<th scope="col">Tipo              </th>                
                <th scope="col">Afiliado          </th>      
                <th scope="col">Documento         </th>
                <th scope="col">Urgente           </th>            	
            	<th scope="col">Fecha Inicio      </th>
        	    <th scope="col">Presupuesto      </th>    
                <th scope="col">&nbsp;            </th>             
            </tr>
        </thead>
        <tbody>
            <?php foreach ($expedientes as $expediente): ?>
               <tr>
               	     <td class="left">
	                 	<?php echo $expediente['Expediente']['id'];   ?>
	                 </td>
	                 <td class="left">
	                    <?php echo $this->html->show_estado_expediente($expediente['Expediente']['estado']);      ?>
 	                 </td>         
	                 
	                 <td class="left">
	                 	<?php echo  $expediente['TipoExpediente']['nombre'] ;   ?>
	                 </td>	                 

	                 <td class="left">
	                    <?php echo $expediente["Afiliado"]["nombre"]?>
 	                 </td>
	                 <td class="left">
	                    <?php echo $expediente["Afiliado"]["documento"]?>
 	                 </td>               	
	                 
	                 
	                 <td class="left">
	                 	<?php echo ( $expediente['Expediente']['urgente']==1 ? "<span class='baja'>Si</span>" : "No" );   ?>
	                 </td>
	                 
	                 <td class="left">
                        <?php echo $this->Time->format('d/m/Y', $expediente['Expediente']['fecha_inicio'] ); ?>	                 	
	                 </td>
	                 <td class="left">
                         <?php echo $this->html->money($expediente["Expediente"]["presupuesto"]) ?>
 	                 </td>         
 	                 
 	                      	
                     <td>
                     	<?php echo $this->html->link("Ver", array("controller" => "expedientes", "action" => "show", $expediente['Expediente']['id']))?>
                        <?php echo $this->html->link("Editar", array("controller" => "expedientes", "action" => "edit", $expediente['Expediente']['id']))?>
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