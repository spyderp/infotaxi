
<?php 
	echo $this->Formato->titulo(__('Editar  Faq', true));
	echo $this->Form->create('HistorialPago'); 
	echo $this->Form->input('id');
	echo $this->Form->input('titulo');
	echo $this->Form->input('contenido', array('type'=>'textarea'));
	echo $this->Form->submit(__('Guardar', true));
	echo $this->FormExtend->cancelButton();
	echo $this->Form->end();
?>

