<article>
<h2><?php echo __('Registro de nuevo Usuario'); ?></h2>
<p>Para acceder a todos los beneficios de infotaxi debe registrarce en el sistema, al terminar se le enviara una 
	notificación a su correo. Seguir los pasos mencionados en el correo para terminar su registro, luego de comprobar 
	su cuenta podra acceder al sistema y registrar su vehiculo.</p>
<p>Recuerde que cuenta con 30 días de demostración del sistema luego se realizara un cargo por vehiculo de $5 mensuales. 
	Este cargo solo se cobrara por el tiempo solicitado es decir que no se acumula un cargo por meses de no utilizar el servicio.
	Para mayor información puede contactarnos a <a href="mailto:info@infotaxi.com.pa" >info@infotaxi.com.pa</a> </p>
<div class="usuarios form">
<?php echo $this->Form->create('Usuario', array('type' => 'file')); ?>
	<fieldset>
		<legend><?php echo __('Llene el siguiente formulario'); ?></legend>
	<?php
		echo $this->Form->input('email', array('type'=>'email'));
		echo $this->Form->input('password', array('label'=>'Contraseña', 'required'=>"required"));
		echo $this->Form->input('password_confirm', array('type'=>'password', 'label'=>'Repetir Contraseña'));
		echo $this->Form->input('nombre');
		echo $this->Form->input('apellido');
		echo $this->Form->input('direccion');
		echo $this->Form->input('telefono');
		echo $this->Form->input('celular');
	?>
	</fieldset>
<?php 
echo $this->Form->submit(__('Guardar', true));
	echo $this->FormExtend->cancelButton();
echo $this->Form->end(); ?>
</div>
</article>