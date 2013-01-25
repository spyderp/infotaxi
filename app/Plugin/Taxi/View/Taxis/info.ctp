<?php
	$this->Js->get('.buton');
	$this->Js->event('click', "
		$('.content').css('max-height', '100%');
	");
?>
<?php echo $this->Formato->titulo(__('Conductores', true)); ?>
<table colspan="0" cellspan="0" width="98%" >
	<?php foreach($taxi['Conductor'] as $conductor){?>
	<tr>
		<td>
			<?php echo $this->Html->image('/'.$conductor['thumb'], array('width'=>'100%'));?>
		</td>
		<td class="conductorInfo">
			<?php
				echo $this->Form->label('Cédula/Pasaporte:');
				echo '<span>'.$conductor['cedula'].'</span>';
				echo $this->Form->label('Nombre:');
				echo '<span>'.$conductor['nombre'].' '.$conductor['apellido'].'</span>';
				echo $this->Form->label('Celular:');
				echo '<span>'.$conductor['celular'].'</span>';
			?>
		</td>
	</tr>
	<?php } ?>
</table>
<div class="taxiBox">
<div class="content">	
<?php echo $this->Formato->titulo(__('Información del Taxi', true)); ?>
<?php
	echo $this->Form->label('Teléfono de Contacto:');
	echo '<span>'.$taxi['Taxi']['telefono_contacto'].'</span><br>';
	echo $this->Form->label('Placa:');
	echo '<span>'.$taxi['Taxi']['placa_carro'].'</span><br>';
	echo $this->Form->label('placa de Taxi:');
	echo '<span>'.$taxi['Taxi']['placa_taxi'].'</span><br>';
	echo $this->Form->label('Cooperativa/Empresa:');
	echo '<span>'.$taxi['Taxi']['grupo'].'</span><br>';
	echo $this->Form->label('Marca:');
	echo '<span>'.$taxi['Marca']['nombre'].'</span><br>';
	echo $this->Form->label('Modelo:');
	echo '<span>'.$taxi['Taxi']['modelo'].'</span><br>';
	echo $this->Form->label('Año:');
	echo '<span>'.$taxi['Taxi']['year'].'</span><br>';
	echo $this->Form->label('Registro Único:');
	echo '<span>'.$taxi['Taxi']['registro_unico'].'</span><br>';
	echo $this->Form->label('N° de Chasis:');
	echo '<span>'.$taxi['Taxi']['numero_chasis'].'</span><br>';
	echo $this->Form->label('Área de trabajo:');
	echo '<span>'.$taxi['Taxi']['zona_trabajo'].'</span><br>';
	echo $this->Html->image('/'.$taxi['Taxi']['thumb'], array('width'=>'100%'));
?>
</div>
<div class="buton">
	Ver más información
</div>
</div>