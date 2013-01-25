<?php echo $this->Formato->titulo(__('Editar Marca', true)); ?>
<div class="marcas form">
<?php echo $this->Form->create('Marca'); ?>
	<fieldset>
		<legend><?php echo __('Datos'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('nombre');
	?>
	</fieldset>
<?php echo $this->Form->submit(__('Guardar', true));
	echo $this->FormExtend->cancelButton();
echo $this->Form->end(); ?>
</div>