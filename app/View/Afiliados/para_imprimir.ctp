<!-- Formulario de Busqueda -->
<? $params_paginator = $this->Paginator->params() ?>
<div id = "listado_afiliados" class="listados">
	<h1> Carnet para imprimir </h1>
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
            	<th scope="col" class="span-1"></th>
            	<th scope="col">Estado</th>
                <th scope="col">Clave</th>
                <th scope="col">Nombre</th>                
                <th scope="col">Documento</th>
                <th scope="col">Fecha Alta</th>  
                <th scope="col">Departamento</th>                              
                <th scope="col">Localidad</th>
                <th scope="col">Dirección</th>
                <th scope="col">Centro de Salud</th>             
            </tr>
        </thead>
            <!-- Here is where we loop through our $posts array, printing out post info -->
            <tbody>
            <?php foreach ($afiliados as $afiliado): ?>
               <tr>
               	     <td class="left">
               	     	<input type="checkbox" name="para_imprimir" values="<?php echo $afiliado["Afiliado"]["id"]?>"
               	     </td>
	                 <td class="left">
	                 	<?php echo $this->html->show_estado($afiliado['Afiliado']['activo']);      ?>
	                 </td>
               	
	                 <td class="left">
	                 	<?php echo $this->HTML->nro_pension($afiliado);?>

	                 </td>
	                 <td class="left">
	                    <?php echo $afiliado['Afiliado']['nombre']   ?>
 	                 </td>
	                 <td class="left">
	                    <?php echo $afiliado['Afiliado']['tipo_documento']."  ".$afiliado['Afiliado']['documento']  ?>
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
	                    <?php echo $afiliado['Afiliado']['domicilio_calle']. " ".$afiliado['Afiliado']['domicilio_nro']   ?>	
	                 </td>	                 
	                 <td class="left">
	                    <?php echo $afiliado['Centro']['nombre']  ?>
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