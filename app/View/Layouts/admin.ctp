<?php
$cakeDescription = __d('Profe', 'PROFE');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		PROFE SAN LUIS
	</title>
	<?php
		echo $this->Html->meta('icon');
        echo $this->Html->css('grid');
        echo $this->Html->css('theme/jquery-ui');
        echo $this->Html->css('menu/menu');
        echo $this->Html->css('popup');
        echo $this->Html->css('buttons');
        echo $this->Html->css('colorbox/colorbox');
		echo $this->Html->css('pagination');
		echo $this->Html->css('admin');
		echo $this->Html->css('flashmessage');
		echo $this->Html->css(array('tabla'));
        echo $this->Html->script(array('jquery',
                                       'jquery.validate',
                                       'jquery.colorbox',
                                       'jquery.ui',
                                       'jquery.buttons',
                                       'calendar-spanish',
									   'afiliado/afiliado',
									   'afiliado/afiliado_form', 'prestaciones/index'));
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
   <div id="headerbg">
      <div id="contenido">
           <div>  <?=$this->element("menu", array("nombre_usuario" => $nombre_usuario));?>  </div>           
       </div>         
    </div>

    <div class="clear"></div>
    
    <!-- CENTER CONTENT -->
    
	<div id="tabContent">
	    <div id="contentHolder">
	        <!-- The AJAX fetched content goes here -->
	        <div id="flashMessages">
  		       <?php echo $this->Session->flash(); ?>
		    </div>
     	<?php echo $this->fetch('content'); ?>
	    </div>
	</div>
	<div class="clear"></div>
	<div>
	    <?//php echo $this->element('sql_dump'); ?>
	</div>
   
<!-- begin footer -->
	<div id="footer">
	     <div class="pinstripe">&nbsp;</div>
	     <div id="copyrightSection">Profe San Luis - <?php echo date("Y"); ?></div>
	</div>   
</body>
</html>
<?=$this->Html->scriptBlock("var root = '".$this->Html->url('/')."';");?>