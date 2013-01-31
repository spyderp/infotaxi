<?php
	echo $this->Html->script('combobox');
	$this->Js->get('document');
	$this->Js->event('ready', "
		$('.usuarioBox').combobox();
	");
$year=array();
for($i=date('Y'); $i>=1970; $i--){
	$year[]=$i;
}
?>

<?php echo $this->Formato->titulo(__('Editar Taxi', true)); ?>
<div class="taxis form">
<?php echo $this->Form->create('Taxi'); ?>
	<fieldset>
		<legend><?php echo __('Datos'); ?></legend>
	<?php
		echo $this->Form->input('id';
		echo $this->Form->input('usuario_id', array('class'=>'usuarioBox'));
		echo $this->Form->input('registro_unico', array('label'=>'Registro único', 'disabled'=>true));
		echo $this->Form->input('numero_chasis', array('label'=>'Número de chasis', 'disabled'=>true));
		echo $this->Form->input('placa_carro', array('label'=>'Placa del carro'));
		echo $this->Form->input('placa_taxi', array('label'=>'Placa de Taxi'));
		echo $this->Form->input('marca_id');
		echo $this->Form->input('modelo');
		echo $this->Form->input('year', array('options'=>$year, 'label'=>'Año del carro'));
		echo $this->Form->input('grupo', array('label'=>'Coperativa/compañia'));
		echo $this->Form->input('zona_trabajo', array('label'=>'Zona en que trabaja'));
		echo $this->Form->input('telefono_contacto', array('label'=>'Teléfono de Contacto'));
		echo $this->Form->label('Imagen subida');
		echo $this->Html->image($img);
		echo $this->Form->input('file.image', array('label'=>'Cambiar Imagen', 'type'=>'file'));
	?>
	</fieldset>
<?php echo $this->Form->submit(__('Guardar', true));
	echo $this->FormExtend->cancelButton();
echo $this->Form->end(); ?>
</div>

