<div id="menu">
    <ul class="menu">
        <li>
          <?=$this->Html->link('<span>Afiliados</span>', array('controller' => 'afiliados', 'action' => 'index'), array('class' => 'parent', 'escape' => false)); ?>
            <div>
               <ul>
                <li>
                    <?=$this->Html->link('<span>Importar Afiliados</span>', array('controller' => 'afiliados', 'action' => 'importar'), array('class' => 'parent', 'escape' => false)); ?>
                </li>
               </ul>
            </div>
        </li>
    </ul>
</div>