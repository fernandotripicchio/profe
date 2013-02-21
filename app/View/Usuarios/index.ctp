<!-- Formulario de Busqueda -->
<div id = "listado_usuarios" class="listados">
	<h1>Listado de Usuarios</h1>

    <div id="listado">
       <table class="list">
          <caption>Usuarios</caption>
          <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nombre</th>                
                <th scope="col">Apellido</th>
                <th scope="col">Email</th>
                <th>&nbsp;</th>             
            </tr>
        </thead>
            <tbody>
            <?php foreach ($usuarios as $usuario): ?>
               <tr>
	                 <td class="left">
	                 	<?php echo $usuario['Usuario']['id'];  ?>
	                 </td>
	                 <td class="left">
	                 	<?php echo $usuario['Usuario']['nombre'];  ?>
	                 </td>
	                 <td class="left">
	                 	<?php echo $usuario['Usuario']['apellido'];  ?>
	                 </td>
	                 <td class="left">
	                 	<?php echo $usuario['Usuario']['email'];  ?>
	                 </td>
                     <td>
                     	<?php echo $this->html->link("Ver", array("controller" => "usuarios", "action" => "show", $usuario['Usuario']['id']))?>
                        <?php echo $this->html->link("Editar", array("controller" => "usuarios", "action" => "edit", $usuario['Usuario']['id']))?>	                 	
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