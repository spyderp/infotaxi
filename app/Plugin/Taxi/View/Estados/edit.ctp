<?php echo $this->Formato->titulo(__('Editar Estado', true)); ?>
<div class="estados form">
<?php echo $this->Form->create('Estado'); ?>
	<fieldset>
		<legend><?php echo __('Datos'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('nombre');
		echo $this->Form->input('opciones');
	?>
	</fieldset>
<?php echo $this->Form->submit(__('Guardar', true));
	echo $this->FormExtend->cancelButton();
echo $this->Form->end(); ?>
</div>

