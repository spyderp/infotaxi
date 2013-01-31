<?php
$year=array();
for($i=date('Y'); $i>=1970; $i--){
	$year[$i]=$i;
}
if(!isset($save)):
?>
<div title="Editar datos de Taxi" class="taxis form">

<?php echo $this->Form->create('Taxi',  array('class'=>'editForm')); ?>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('usuario_id', array('type'=>'hidden'));
		echo $this->Form->input('registro_unico', array('type'=>'hidden'));
		echo '<div class="input">'.$this->Form->label('Registro único').' '.$this->data['Taxi']['registro_unico'].'</div>';
		echo $this->Form->input('numero_chasis', array('type'=>'hidden'));
		echo '<div class="input">'.$this->Form->label('N° Chasis').' '.$this->data['Taxi']['numero_chasis'].'</div>';
		echo $this->Form->input('placa_carro', array('label'=>'Placa del carro', 'class'=>'TaxiPlaca_carro'));
		echo $this->Form->input('placa_taxi',array('type'=>'hidden'));
		echo '<div class="input">'.$this->Form->label('Placa Taxi').' '.$this->data['Taxi']['placa_taxi'].'</div>';
		echo $this->Form->input('marca_id');
		echo $this->Form->input('modelo', 'class'=>'TaxiModelo');
		echo $this->Form->input('year', array('options'=>$year, 'label'=>'Año del carro', 'class'=>'TaxiYear'));
		echo $this->Form->input('grupo', array('label'=>'Coperativa/compañia', 'class'=>'TaxiGrupo'));
		echo $this->Form->input('zona_trabajo', array('label'=>'Zona en que trabaja', 'class'=>'TaxiZona_trabajo'));
		echo $this->Form->input('telefono_contacto', array('label'=>'Teléfono de Contacto', 'class'=>'TaxiTelefono_contacto'));
		echo $this->Form->submit(__('Guardar', true));
		echo '<div class="submit">'.$this->Form->button('Cancelar', array('class'=>'cancelDialog')).'</div>';	
echo $this->Form->end(); 
	?>

</div>
<?php 
else:
	echo json_encode(array('message'=>$this->Session->flash(), 'datos'=>$datos, 'success'=>$success));
endif;
?>

