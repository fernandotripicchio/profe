<div id="menu">
    <ul class="menu">
        <li>
          <?=$this->Html->link('<span>Afiliados</span>', array('controller' => 'afiliados', 'action' => 'index'), array('class' => 'parent', 'escape' => false)); ?>
            <div>
               <ul>
                <li>
                    <?=$this->Html->link('<span>Listado</span>', array('controller' => 'afiliados', 'action' => 'index'), array('class' => 'parent', 'escape' => false)); ?>
                </li>
               	
                <li>
                    <?=$this->Html->link('<span>Actualizar Afiliados</span>', array('controller' => 'afiliados', 'action' => 'importar'), array('class' => 'parent', 'escape' => false)); ?>
                </li>
                <li>
                    <?=$this->Html->link('<span>Baja Afiliados</span>', array('controller' => 'afiliados', 'action' => 'bajas'), array('class' => 'parent', 'escape' => false)); ?>
                </li>

                
               </ul>
            </div>
        </li>
        
        <li>
           <?=$this->Html->link('<span>Auditoria</span>', array('controller' => 'centros', 'action' => 'index'), array('class' => 'parent', 'escape' => false)); ?>
            <div>
               <ul>
                <li>
                    <?=$this->Html->link('<span>Nueva Auditoria</span>', array('controller' => 'prestadores', 'action' => 'add'), array('class' => 'parent', 'escape' => false)); ?>
                </li>
               </ul>
            </div>            
                   	
        </li>

        <li>
            <?=$this->Html->link('<span>Prestaciones</span>', array('controller' => 'prestadores', 'action' => 'index'), array('class' => 'parent', 'escape' => false)); ?>
            <div>
               <ul>
                <li>
                    <?=$this->Html->link('<span>Listado</span>', array('controller' => 'prestadores', 'action' => 'index'), array('class' => 'parent', 'escape' => false)); ?>
                </li>
               	
                <li>
                    <?=$this->Html->link('<span>Nuevo Prestador</span>', array('controller' => 'prestadores', 'action' => 'add'), array('class' => 'parent', 'escape' => false)); ?>
                </li>
                <li>
                    <?=$this->Html->link('<span>Nuevo Prestación</span>', array('controller' => 'prestadores', 'action' => 'add'), array('class' => 'parent', 'escape' => false)); ?>
                </li>
                
               </ul>
            </div>            
            
        </li>

        
        
        
    
                
        <li>
            <?=$this->Html->link('<span>Consultas</span>', array('controller' => 'reportes', 'action' => 'index'), array('class' => 'parent', 'escape' => false)); ?>
            
        </li>
        
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


                
        <li style="float: right">
            <?=$this->html->link("<span>Salir</span>" , array('controller' => 'Usuarios', 'action' => 'logout'), array('class' => 'parent', 'escape' => false)); ?> 
        </li>
        <li style="float: right">
           <?=$this->html->link("<span>$nombre_usuario</span>" , array('controller' => 'Usuarios', 'action' => 'edit', $id_usuario), array('class' => 'parent', 'escape' => false)); ?>        	
        </li>	
                    
    </ul>
    
</div>