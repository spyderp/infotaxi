<?php
if(!isset($save)):
?>
	<div  title="Datos a editar" class="usuarios form">
	<?php echo $this->Form->create('Usuario', array('class'=>'editForm')); ?>
		<?php
			echo $this->Form->input('id');
			echo '<div class="input">'.$this->Form->label('Correo').' '.$this->data['Usuario']['email'].'</div>';
			echo $this->Form->input('email', array('type'=>'hidden'));
			echo $this->Form->input('password', array('label'=>'Contraseña', 'class'=>'UsuarioPassword'));
			echo $this->Form->input('password_confirm', array('type'=>'password', 'label'=>'Repetir Contraseña', 'class'=>'UsuarioPasswordConfirm'));
			echo $this->Form->input('cedula', array('label'=>'Cédula'));
			echo $this->Form->input('nombre', array('class'=>'UsuarioNombre'));
			echo $this->Form->input('apellido', array('class'=>'UsuarioApellido'));
			echo $this->Form->input('direccion', array('class'=>'UsuarioDireccion', 'label'=>'Dirección'));
			echo $this->Form->input('telefono', array('class'=>'UsuarioTelefono', 'label'=>'Teléfono'));
			echo $this->Form->input('celular', array('class'=>'UsuarioCelular'));
		?>
	<?php
	echo $this->Form->submit(__('Guardar', true));
	echo '<div class="submit">'.$this->Form->button('Cancelar', array('class'=>'cancelDialog')).'</div>';	
	echo $this->Form->end(); ?>
	</div>
<?php
else:
	echo json_encode(array('message'=>$this->Session->flash(), 'datos'=>$datos, 'success'=>$success));
endif;
?>