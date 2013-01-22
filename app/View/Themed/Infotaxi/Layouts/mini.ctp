<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php echo $this->Html->charset(); ?> 
<title>
<?php echo $title_for_layout; ?>
</title>
<?php echo $this->Html->css(array('normalize','mini'));?>
<?php echo $this->Html->script(array('prefixfree','http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js'));?>
<?php echo $scripts_for_layout; ?>
</head>
<body>
	<header id="header">
		<?php echo $this->Html->image('mini-logo.png',  array('alt'=>'Logo de InfoTaxi', 'wight'=>'80%'));?>
		<h1>InfoTaxi</h1>
		
	</header>
	<section id="section">
		<span class="info">
			Servicio para la ciudad de Panamá que le informa de la auntenticidad del vehiculo y del conductor que lo transporta.
			Para mayor información haga <a>click aquí...</a>
		</span>
		<?php echo $content_for_layout; ?>
	</section>
	<footer id="footer">
		<a href="www.infotaxi.com.pa">infotaxi.com.pa</a> 2012 - Derechos Reservados
	</footer>
<?php echo $this->Js->writeBuffer();?>
</body>

</html>