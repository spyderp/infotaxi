<?php

$year=array();
for($i=date('Y'); $i>=1970; $i--){
	$year[$i]=$i;
}
if(!isset($save)):
?>

<div title="Editar datos del Conductor" class="taxis form">
<?php echo $this->Form->create('Conductor',  array('class'=>'editForm', 'type'=>'post')); ?>
	
<?php
	echo $this->Form->input('id');
	echo $this->Form->input('cedula', array('type'=>'hidden'));
	echo $this->Form->input('nombre', array('class'=>'ConductorNombre'));
	echo $this->Form->input('apellido', array('class'=>'ConductorApellido'));
	echo $this->Form->input('celular', array('class'=>'ConductorCedula'));
?>
<?php echo $this->Form->submit(__('Guardar', true));
echo '<div class="submit">'.$this->Form->button('Cancelar', array('class'=>'cancelDialog')).'</div>';	
echo $this->Form->end(); ?>
</div>
<?php 
else:
	echo json_encode(array('message'=>$this->Session->flash(), 'datos'=>$datos, 'success'=>$success));
endif;
?>