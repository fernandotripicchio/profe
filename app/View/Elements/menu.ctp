<div id="menu">
    <ul class="menu">
        <li>
          <?=$this->Html->link('<span>Afiliados</span>', array('controller' => 'afiliados', 'action' => 'index'), array('class' => 'parent', 'escape' => false)); ?>
            <div>
               <ul>
                <li>
                    <?=$this->Html->link('<span>Listados</span>', array('controller' => 'afiliados', 'action' => 'index'), array('class' => 'parent', 'escape' => false)); ?>
                </li>
                <!--                
                <li>
                    <?=$this->Html->link('<span>Imprimir Carnets</span>', array('controller' => 'afiliados', 'action' => 'para_imprimir'), array('class' => 'parent', 'escape' => false)); ?>
                </li>
                <li>
                    <?=$this->Html->link('<span>Actualizar Afiliados </span>', array('controller' => 'afiliados', 'action' => 'importar'), array('class' => 'parent', 'escape' => false)); ?>
                </li>
                <li>
                    <?=$this->Html->link('<span>Actualizar Baja Afiliados</span>', array('controller' => 'afiliados', 'action' => 'bajas'), array('class' => 'parent', 'escape' => false)); ?>
                </li>
               -->
               </ul>
            </div>
        </li>
<!--
        <li>
          <?=$this->Html->link('<span>DOSEP</span>', array('controller' => 'doseps', 'action' => 'index'), array('class' => 'parent', 'escape' => false)); ?>
            <div>
               <ul>
                <li>
                    <?=$this->Html->link('<span>Consultar</span>', array('controller' => 'doseps', 'action' => 'index'), array('class' => 'parent', 'escape' => false)); ?>
                </li>                
               </ul>
            </div>
        </li>



        <li>
          <?=$this->Html->link('<span>Centros</span>', array('controller' => 'centros', 'action' => 'index'), array('class' => 'parent', 'escape' => false)); ?>
            <div>
               <ul>
                <li>
                    <?=$this->Html->link('<span>Listados</span>', array('controller' => 'centros', 'action' => 'index'), array('class' => 'parent', 'escape' => false)); ?>
                </li>                
               </ul>
            </div>
        </li>

        
        
        <li>
            <?=$this->Html->link('<span>Expedientes</span>', array('controller' => 'expedientes', 'action' => 'index'), array('class' => 'parent', 'escape' => false)); ?>
            <div>
               <ul>
	                <li>
	                    <?=$this->Html->link('<span>Nuevo Expediente</span>', array('controller' => 'expedientes', 'action' => 'add'), array('class' => 'parent', 'escape' => false)); ?>
	                </li>
               </ul>
            </div>               
        </li>
        <li>
            <?=$this->Html->link('<span>Prestaciones</span>', array('controller' => 'prestadores', 'action' => 'index'), array('class' => 'parent', 'escape' => false)); ?>
            <div>
               <ul>               	
                <li>
                    <?=$this->Html->link('<span>Nuevo Prestador</span>', array('controller' => 'prestadores', 'action' => 'add'), array('class' => 'parent', 'escape' => false)); ?>
                </li>
                <li>
                    <?=$this->Html->link('<span>Listado Prestadores</span>', array('controller' => 'prestadores', 'action' => 'index'), array('class' => 'parent', 'escape' => false)); ?>
                </li>          	
                <li>
                    <?=$this->Html->link('<span>Listado Prestaciones</span>', array('controller' => 'prestaciones', 'action' => 'index'), array('class' => 'parent', 'escape' => false)); ?>
                </li>

               </ul>
            </div>            
        </li>
        <li>
            <?=$this->Html->link('<span>Consultas</span>', array('controller' => 'reportes', 'action' => 'index'), array('class' => 'parent', 'escape' => false)); ?>
        </li>
       
        <? if ( $rol_usuario == "administrador") { ?>
	        <li>
	           <?=$this->Html->link('<span>Administración</span>', array('controller' => 'centros', 'action' => 'index'), array('class' => 'parent', 'escape' => false)); ?>
	            <div>
	               <ul>
				        <li>
				            <?=$this->Html->link('<span>Centros de Salud</span>', array('controller' => 'centros', 'action' => 'index'), array('class' => 'parent', 'escape' => false)); ?>
				        </li>		
		                <li>
		                  <?=$this->Html->link('<span>Usuarios</span>', array('controller' => 'usuarios', 'action' => 'index'), array('class' => 'parent', 'escape' => false)); ?>
		                 </li> 
		                <li>
		                    <?=$this->Html->link('<span>Nuevo Usuario</span>', array('controller' => 'usuarios', 'action' => 'add'), array('class' => 'parent', 'escape' => false)); ?>
		                </li>
	               </ul>
	            </div>            
	        </li>
       <? } ?>
       -->
        <li style="float: right">
            <?=$this->html->link("<span>Salir</span>" , array('controller' => 'Usuarios', 'action' => 'logout'), array('class' => 'parent', 'escape' => false)); ?> 
        </li>
        <li style="float: right">
           <?=$this->html->link("<span>$nombre_usuario</span>" , array('controller' => 'Usuarios', 'action' => 'edit', $id_usuario), array('class' => 'parent', 'escape' => false)); ?>        	
        </li>	
                    
    </ul>
    
</div>