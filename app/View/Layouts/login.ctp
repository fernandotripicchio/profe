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
        echo $this->Html->css('theme/jquery-ui');
        echo $this->Html->css('menu/menu');
        echo $this->Html->css('buttons');
    	echo $this->Html->css('pagination');
		echo $this->Html->css('login');
		echo $this->Html->css('flashmessage');
		echo $this->Html->script(array('jquery',
                                       'jquery.validate',
                                       'jquery.ui',
                                       'jquery.buttons',
        ));
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
 <body>
     <!-- CENTER CONTENT -->
     <div id="container">
			<?php echo $this->Session->flash(); ?>
			<?php echo $this->fetch('content'); ?>

     </div>
     <!--CLEAR FOOTER TO PREVENT BUNCHING-->
     <div class="clear"></div>
     <div id="footer"></div>  
     <?php echo $this->element('sql_dump'); ?>
</body>
</html>
<?=$this->Html->scriptBlock("var root = '".$this->Html->url('/')."';");?>