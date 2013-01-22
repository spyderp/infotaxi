<!DOCTYPE html>
<html lang="es">
<head>
<?php echo $this->Html->charset(); ?>
<title>
<?php echo $title_for_layout; ?>
</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
<?php echo $this->Html->css(array('normalize','style', 'jquery-ui.min')); ?>
<?php echo $this->Html->script(array('prefixfree','http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js', 'http://code.jquery.com/ui/1.9.1/jquery-ui.js')); ?>
<?php echo $scripts_for_layout; ?>
</head>
<body>
<div align="center">
	<div id="box">
	<header id="header">
		<figure id="logo">
		<?php echo $this->Html->image('infotaxi-logo.png', array( 'link'=>'/','class'=>'logo', 'alt'=>'InfoTaxi')); ?>
		</figure>
		<div id="quit">
				<?php echo $this->Html->link('Salir', '/logout'); ?>
		</div>
		<div id="descripUsuario">
			<?php
				echo __('Bienvenido,',true);
			?>
			<span>
			<?php
				echo $nombreCompleto;
			?>
			</span>
		</div>	

	</header>
	<nav id="navegation">
		
	</nav>
		<?php echo $this->Session->flash(); ?>
		<section id="left">
			<article id="content">
				<?php echo $content_for_layout; ?>
			</article>
			
		</section>
		<section id="right">
			<article>
				dfgodfgjkdfgj
				<?php //echo $content_for_layout; ?>
			</article>
		</section>
		<footer id="footer" >
				<?php echo $this->Html->link('Politicas de Servicio', array()); ?>
				|
				<?php echo $this->Html->link('Contactenos', array()); ?>
				<div class="copy">
					Copyright ©<?php echo date('Y'); ?> Infotaxi.com.pa
				</div>
		</footer>
	</div>
</div>
<?php echo $this->Js->writeBuffer();?>
</body>

</html>