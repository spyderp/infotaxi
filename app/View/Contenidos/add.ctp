
<?php 
	echo $this->Formato->titulo(__('Agregar FAQ', true));
	echo $this->Form->create('Contenido');
	echo $this->Form->input('titulo');
	echo $this->Form->input('contenido', array('type'=>'textarea'));
	echo $this->Form->submit(__('Guardar', true));
	echo $this->FormExtend->cancelButton();
	echo $this->Form->end();
?>

