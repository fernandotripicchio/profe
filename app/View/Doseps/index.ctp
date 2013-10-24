<!-- Formulario de Busqueda -->
<? $params_paginator = $this->Paginator->params() ?>
<div id = "listado_afiliados" class="listados">
	<h1>Afiliados DOSEP</h1>
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
            	<th scope="col">Documento</th>                
                <th scope="col">Nombre</th>
                <th scope="col">Parentezco</th>
                <th scope="col">Fecha de Nacimiento</th>
                <th scope="col">Localidad</th>
                <th scope="col">Empleador</th>
            </tr>
        </thead>
            <tbody>
            <?php foreach ($afiliados as $afiliado): ?>
            	
               <tr>
	                 <td class="left">
                       <?php echo $afiliado["Dosep"]["numerodoc"]?>
	                 </td>                 
               	
	                 <td class="left">
                       <?php echo $afiliado["Dosep"]["apellidonombre"]?>
	                 </td>
	                 
	                 <td class="left">
						<?php echo $afiliado["Dosep"]["tiporelacion"]?>
	                 </td>
	                 
	                 <td class="left">
						<?php echo $afiliado["Dosep"]["fechanacimientopers"]?>
	                 </td>
	                 
	                 <td class="left">
						<?php echo $afiliado["Dosep"]["localidad"]?>
 	                 </td>
	                 <td class="left">
							<?php echo $afiliado["Dosep"]["empleador"]?>
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