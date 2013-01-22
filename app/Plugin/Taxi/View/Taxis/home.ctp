<?php
	echo $this->Html->script('jquery-ui', array('inline'=>false));
	echo $this->Html->script('jquery.form', array('inline'=>false));
	echo $this->Html->css('jquery-ui', array('inline'=>false));
?>
<h2>
	Detalles de su cuenta
</h2>
<article class="usuarioDetalles">
	
	<div class="datos">
		<table cellpadding="5">
			<tr>
				<td class="nombre"><?php echo $this->Form->label('Nombre').' <span>'.$user['Usuario']['nombre'].'</span>'; ?></td>
				<td class="apellido"><?php echo $this->Form->label('Apellido').' <span>'.$user['Usuario']['apellido'].'</span>'; ?></td>
			</tr>
			<tr >
				<td class="cedula"><?php echo $this->Form->label('Cédula').' <span>'.$user['Usuario']['cedula'].'</span>'; ?></td>
				<td><?php echo $this->Form->label('Correo').' '.$user['Usuario']['email']; ?></td>
			</tr>
			<tr>
				<td class="telefono"><?php echo $this->Form->label('Teléfono').' <span>'.$user['Usuario']['telefono'].'</span>'; ?></td>
				<td class="celular"><?php echo $this->Form->label('Celular').' <span>'.$user['Usuario']['celular'].'</span>'; ?></td>
			</tr>
			<tr>
				<td colspan="2" class="direccion" ><?php echo $this->Form->label('Dirección').' <span>'.$user['Usuario']['direccion'].'</span>'; ?></td>
			</tr>
			<tr>
				<td><?php echo $this->Form->label('Creado').' '.$user['Usuario']['fecha_creacion']; ?></td>
				<td><?php echo $this->Form->label('Último Acceso').' '.$user['Usuario']['ultimo_acceso']; ?></td>
			</tr>
		</table>
	</div>
	<div class="opciones">
		<figure  class="Imagen">
			<?php echo $this->Html->image('/'.$user['Usuario']['thumb'], array('alt'=>$user['Usuario']['nombre'].' '.$user['Usuario']['apellido'], 'class'=>'usuarioImagen' )); ?>
		</figure>
		<?php echo $this->Html->link('Editar', array('plugin'=>'usuarios', 'controller'=>'usuarios', 'action'=>'editarCliente', $user['Usuario']['id']), array('class'=>'button editUser'));?>
	</div>
	
</article>
<h2>
	Lista de Taxi
</h2>
<article class="taxiDetalles">
	<div id="accordion-taxi">
	<?php
		foreach ($taxi as $key => $value) {
	?>
		<h3  data-label="taxi-<?php echo $value['Taxi']['registro_unico']; ?>">
			<?php echo $this->Form->label('Registro único:'); ?>
			<?php echo $value['Taxi']['registro_unico']; ?>
		</h3>
		<div data-cod="taxi-<?php echo $value['Taxi']['registro_unico']; ?>" class="taxiContenedor">
			<div class="datos">
				<ul>
					<li>
						<?php echo $this->Form->label('Número de chasis:'); ?>
						<?php echo $value['Taxi']['numero_chasis']; ?>
					</li>
					<li>
						<?php echo $this->Form->label('Placa:'); ?>
						<?php echo $value['Taxi']['placa_carro']; ?>
					</li>
					<li>
						<?php echo $this->Form->label('Placa de Taxi:'); ?>
						<?php echo $value['Taxi']['placa_taxi']; ?>
					</li>
					<li>
						<?php echo $this->Form->label('Marca:'); ?>
						<?php echo $value['Marca']['nombre']; ?>
					</li>
					<li>
						<?php echo $this->Form->label('Modelo:'); ?>
						<?php echo $value['Taxi']['modelo']; ?>
					</li>
					<li>
						<?php echo $this->Form->label('Año:'); ?>
						<?php echo $value['Taxi']['year']; ?>
					</li>
					<li>
						<?php echo $this->Form->label('Cooperativa/Empresa:'); ?>
						<?php echo $value['Taxi']['grupo']; ?>
					</li>
					<li>
						<?php echo $this->Form->label('Zona de Trabajo:'); ?>
						<?php echo $value['Taxi']['zona_trabajo']; ?>
					</li>
					<li>
						<?php echo $this->Form->label('Teléfono de Contacto:'); ?>
						<?php echo $value['Taxi']['telefono_contacto']; ?>
					</li>
				</ul>
				

			</div>
			<div class="opciones">
				<figure id="fotoTaxi-<?php echo $value['Taxi']['registro_unico']; ?>" class="taxiImagen">
					<?php echo $this->Html->image('/'.$value['Taxi']['thumb'], array('alt'=>$value['Taxi']['registro_unico'])); ?>
				</figure>
				<?php echo $this->Html->link('Editar', array('plugin'=>'taxi', 'controller'=>'taxis', 'action'=>'edit', $value['Taxi']['id']), array('class'=>'button'));?>
				<?php echo $this->Html->link('Borrar', array('plugin'=>'taxi', 'controller'=>'taxis', 'action'=>'borrar', $value['Taxi']['id']), array('class'=>'button'), __('Desea eliminar este registro', true));?>
			</div>
		</div>
			
	<?php
		}
	?>
</article>
<h2>
	Lista de Conductores
</h2>
<arcticle class="conductoresDetalles">
	<div id="accordion-conductores">
	<?php
		foreach ($conductor as $key => $value) {
	?>
		<h3  data-label="conductor-<?php echo $value['Conductor']['cedula']; ?>">
			<?php echo $this->Form->label('Cédula:'); ?>
			<?php echo $value['Conductor']['cedula']; ?>
		</h3>
		<div data-cod="taxi-<?php echo $value['Conductor']['cedula']; ?>" class="conductorContenedor">
			<div class="datos">
				<figure>
					<?php echo $this->Html->image('/'.$value['Conductor']['thumb'], array('alt'=>$value['Conductor']['nombre'].' '.$value['Conductor']['apellido'])); ?>
				</figure>
				<ul>
					<li>
						<?php echo $this->Form->label('Nombre:'); ?>
						<?php echo $value['Conductor']['nombre'].' '.$value['Conductor']['apellido']; ?>
					</li>
					<li>
						<?php echo $this->Form->label('Celular:'); ?>
						<?php echo $value['Conductor']['celular']; ?>
					</li>
				</ul>
			</div>
			<div class="opciones">
				<?php echo $this->Html->link('Editar', array('plugin'=>'taxi', 'controller'=>'conductor', 'action'=>'edit', $value['Conductor']['id']), array('class'=>'button'));?>
				<?php echo $this->Html->link('Borrar', array('plugin'=>'taxi', 'controller'=>'conductor', 'action'=>'borrar', $value['Conductor']['id']), array('class'=>'button'), __('Desea eliminar este registro', true));?>
			</div>
		</div>
	<?php
		}
	?>
	</div>
</arcticle>
<?php
	echo $this->Html->script('clientesHome');
?>