<article style="height:550px;">
<?php 
	echo $this->Formato->titulo(__('Contactenos', true));
	echo $this->Form->create('Contacto');
	echo $this->Form->input('nombre', array('placeholder'=>'Juan de los Palotes'));
	echo $this->Form->input('correo', array('type'=>'email', 'placeholder'=>'sucorreo@correo.com'));
	echo $this->Form->input('telefono', array('label'=>'Télefono', 'placeholder'=>'555-5555/66-66-6666'));
	echo $this->Form->input('mensaje', array('type'=>'textarea', 'placeholder'=>'Escriba el mensaje que nos quiere hacer llegar'));
	echo $this->Form->submit(__('Enviar', true));
	echo $this->Form->end();
?>
</article>
