<?php

$year=array();
for($i=date('Y'); $i>=1970; $i--){
	$year[$i]=$i;
}
?>

<?php echo $this->Formato->titulo(__('Agregar Conductor', true)); ?>
<div class="taxis form">
<?php echo $this->Form->create('Conductor', array('type'=>'file')); ?>
	<fieldset>
		<legend><?php echo __('Datos'); ?></legend>
<?php
	echo $this->Form->input('Taxi.id', array('class'=>'taxiBox', 'options'=>$taxis, 'label'=>'Taxi', 'empty'=>'','multiple' => true));
	echo $this->Form->input('id',array('type'=>'hidden'));
	echo $this->Form->input('cedula', array('diabled'=>true));
	echo $this->Form->input('nombre', array('diabled'=>true));
	echo $this->Form->input('apellido', array('diabled'=>true));
	echo $this->Form->input('file.image', array('label'=>'Imagen adjunta', 'type'=>'file'));
	
?>
	</fieldset>
<?php echo $this->Form->submit(__('Guardar', true));
	echo $this->FormExtend->cancelButton();
echo $this->Form->end(); ?>
</div>