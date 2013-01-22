<!DOCTYPE html>
<html lang="es">
<head>
<?php echo $this->Html->charset(); ?>
<title>
<?php echo $title_for_layout; ?>
</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
<?php echo $this->Html->css(array('normalize','public')); ?>
<?php echo $this->Html->script(array('prefixfree','http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js')); ?>
<?php echo $scripts_for_layout; ?>
</head>
<body>
<div id="headerBox" >
	<header>
		<figure id="logo">
		<?php echo $this->Html->image('infotaxi-logo.png', array( 'link'=>'/','class'=>'logo', 'alt'=>'InfoTaxi')); ?>
		</figure>
		<nav>
			<ul>
				<li><a class="pag" href="/">Inicio</a> </li>
				<li><a class="pag" href="/registro">Registro</a> </li>
				<li><a class="pag" href="/servicios">Servicio</a></li>
				<li><a class="pag" href="/faq">FAQ</a> </li>
				<li><a class="pag" href="/contacto">Contáctenos</a> </li>
			</ul>
		</nav>				
	</header>
</div>
<?php echo $this->Session->flash(); ?>
<div id="content">
	<aside id="left" >
		<div id="login" >
			<h2>Acceso al Sistema</h2>
			<?php echo $this->Form->create('Usuario', array('url' => '/accesoSistema', 'type'=>'post')) ?>
	<?php  echo $this->Form->input('email', array('label' => __('Correo', true))); ?>
	<hr>
	<?php echo $this->Form->input('password', array('label' => __('Contraseña', true))); ?>
	<hr>
	<?php 
 	if (isset($userAttempts) && $userAttempts >= UsuariosController::ATTEMTS) {
        echo $this->ReCaptcha->getHtml('white');
    }
	?>
	<?php 
	echo $this->Form->submit('Acceder al Sistema', array('div'=>false));
	echo "<br><br><center>".$this->Html->link(__('¿Olvidó su contraseña?', true), array('plugin' => 'password_recovery', 'controller' => 'passwordrecoverys', 'action' => 'reset'), array('class'=>'newPassword'))."</center";
	echo $this->form->end();
	?>

		</div>
		
	</aside>
	<section id="section">
		<div id="contenido">
			<?php echo $content_for_layout; ?>
		</div>
	</section>
</div>
<div id="subfooterBox" >
	<div id="subfooter" >
		<div class="threeBox">
			<?php echo $this->Html->image('mobile.png', array('style'=>'width:100%')); ?>
		</div>
		<div class="threeBox faq">
			<h3>Preguntas Frecuentes</h3>
			<ul>
			<?php 
			foreach ($faqs as $value) {
				echo "<li>".$this->Html->link($value, '/faq', array('class'=>'pag'))."</li>";	
			}	
			?>
			</ul>
		</div>
		<aside class="threeBox media">
			<h3>Siguenos...</h3>
			<ul>
				<li>
					<?php echo $this->Html->image('twitter.png', array('alt'=>'Twitter', 'width'=>32, 'height'=>32, 'align'=>'center')); ?>
					<?php echo $this->Html->link('@infotaxiPty', 'www.twitter.com/infotaxipty');?>
				</li>
				<li>
					<?php echo $this->Html->image('facebook.png', array('alt'=>'Facebook', 'width'=>32, 'height'=>32, 'align'=>'center')); ?>
					<?php echo $this->Html->link('facebook.com/infotaxipty', 'www.facebook.com/infotaxipty');?>
				</li>
				<li>
					<?php echo $this->Html->image('google.png', array('alt'=>'Google plus', 'width'=>32, 'height'=>32, 'align'=>'center')); ?>
					<?php echo $this->Html->link('plus.google.com/infotaxi', 'plus.google.com/infotaxi');?>
				</li>
			</ul>
		</aside>
	</div>
</div>
<div id="footerBox">
	<footer>
		<!--<?php echo $this->Html->link('Mapa del sitio', array()); ?> 
		|
		<?php echo $this->Html->link('Termino de uso', array()); ?> 
		|
		<?php echo $this->Html->link('Politicas de Servicio', array()); ?>--> 
		<div class="copy">
			Copyright ©<?php echo date('Y'); ?> Infotaxi.com.pa
		</div>
	</footer>
</div>
<?php echo $this->Js->writeBuffer();?>
<?php echo $this->Html->script('public');?>
<script type="text/javascript">
/*
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36634961-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
*/
</script>
</body>

</html>