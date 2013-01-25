<?php
if(!isset($save)):
?>
	<div  title="Datos a editar" class="usuarios form">
	<?php echo $this->Form->create('Usuario', array('class'=>'usuarioEditForm')); ?>
		<?php
			echo $this->Form->input('id');
			echo $this->Form->input('email', array('disabled'=>'disabled'));
			echo $this->Form->input('password', array('label'=>'Contraseña'));
			echo $this->Form->input('password_confirm', array('type'=>'password', 'label'=>'Repetir Contraseña'));
			echo $this->Form->input('cedula', array('label'=>'Cédula'));
			echo $this->Form->input('nombre');
			echo $this->Form->input('apellido');
			echo $this->Form->input('direccion');
			echo $this->Form->input('telefono');
			echo $this->Form->input('celular');
		?>
	<?php
	echo $this->Form->submit(__('Guardar', true));
	echo '<div class="submit">'.$this->Form->button('Cancelar', array('class'=>'cancelButton')).'</div>';	
	echo $this->Form->end(); ?>
	</div>
<?php
else:
	echo json_encode(array('message'=>$this->Session->flash(), 'datos'=>$datos, 'success'=>$success));
endif;
?>