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
            <?=$this->Html->link('<span>Administración</span>', array('controller' => 'centros', 'action' => 'index'), array('class' => 'parent', 'escape' => false)); ?>
        </li>
        
    </ul>
</div>