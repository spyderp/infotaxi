<h2>Acceso al Sistema</h2>
<h3>Cambiar Contraseña</h3>

<?php echo $this->Form->create('PasswordRecoverys', array('url' => '/password_recovery/password_recoverys/reset')); ?>
	<?php echo $this->Form->input($className . '.' . $emailField, array('wrap' => 'required', 'size' => 40, 'label' => __('Email', true), 'error' => __('Email no se encuentra', true))); ?>
<?php echo $this->Form->end(__('Reset', true)); ?>
	