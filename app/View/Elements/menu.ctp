<div id="menu">
    <ul class="menu">
        <li>
          <?=$this->Html->link('<span>Afiliados</span>', array('controller' => 'afiliados', 'action' => 'index'), array('class' => 'parent', 'escape' => false)); ?>
            <div>
               <ul>
                <li>
                    <?=$this->Html->link('<span>Actualizar Afiliados</span>', array('controller' => 'afiliados', 'action' => 'importar'), array('class' => 'parent', 'escape' => false)); ?>
                </li>
                <li>
                    <?=$this->Html->link('<span>Baja Afiliados</span>', array('controller' => 'afiliados', 'action' => 'importar'), array('class' => 'parent', 'escape' => false)); ?>
                </li>

                
               </ul>
            </div>
        </li>
        <li>
            <?=$this->Html->link('<span>Centros de Salud</span>', array('controller' => 'centros', 'action' => 'index'), array('class' => 'parent', 'escape' => false)); ?>
        </li>
        <li>
            <?=$this->Html->link('<span>Reportes</span>', array('controller' => 'reportes', 'action' => 'index'), array('class' => 'parent', 'escape' => false)); ?>
        </li>        
        <li>
            <?=$this->Html->link('<span>Usuarios</span>', array('controller' => 'usuarios', 'action' => 'index'), array('class' => 'parent', 'escape' => false)); ?>
        </li>
        <li style="float: right">
            <?=$this->html->link("<span>$nombre_usuario - Salir</span>" , array('controller' => 'Usuarios', 'action' => 'logout'), array('class' => 'parent', 'escape' => false)); ?> 
        </li>            
    </ul>
    
</div>