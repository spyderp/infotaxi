<div class="usuarios view">
<h2><?php  echo __('Usuario'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Password'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['password']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['nombre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Apellido'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['apellido']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Direccion'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['direccion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Telefono'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['telefono']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Celular'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['celular']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Activo'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['activo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha Creación'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['fecha_creación']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ultimo Acceso'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['ultimo_acceso']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Rol Id'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['rol_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Archivo Id'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['archivo_id']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Usuario'), array('action' => 'edit', $usuario['Usuario']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Usuario'), array('action' => 'delete', $usuario['Usuario']['id']), null, __('Are you sure you want to delete # %s?', $usuario['Usuario']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Usuarios'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Usuario'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Taxis'), array('controller' => 'taxis', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Taxi'), array('controller' => 'taxis', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Taxis'); ?></h3>
	<?php if (!empty($usuario['Taxi'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Registro Unico'); ?></th>
		<th><?php echo __('Cupo'); ?></th>
		<th><?php echo __('Numero Chasis'); ?></th>
		<th><?php echo __('Placa Carro'); ?></th>
		<th><?php echo __('Placa Taxi'); ?></th>
		<th><?php echo __('Modelo'); ?></th>
		<th><?php echo __('Year'); ?></th>
		<th><?php echo __('Grupo'); ?></th>
		<th><?php echo __('Zona Trabajo'); ?></th>
		<th><?php echo __('Telefono Contacto'); ?></th>
		<th><?php echo __('Meses'); ?></th>
		<th><?php echo __('Fecha Creacion'); ?></th>
		<th><?php echo __('Fecha Ultimo Pago'); ?></th>
		<th><?php echo __('Visitas'); ?></th>
		<th><?php echo __('Marca Id'); ?></th>
		<th><?php echo __('Usuario Id'); ?></th>
		<th><?php echo __('Estado Id'); ?></th>
		<th><?php echo __('Archivo Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($usuario['Taxi'] as $taxi): ?>
		<tr>
			<td><?php echo $taxi['id']; ?></td>
			<td><?php echo $taxi['registro_unico']; ?></td>
			<td><?php echo $taxi['cupo']; ?></td>
			<td><?php echo $taxi['numero_chasis']; ?></td>
			<td><?php echo $taxi['placa_carro']; ?></td>
			<td><?php echo $taxi['placa_taxi']; ?></td>
			<td><?php echo $taxi['modelo']; ?></td>
			<td><?php echo $taxi['year']; ?></td>
			<td><?php echo $taxi['grupo']; ?></td>
			<td><?php echo $taxi['zona_trabajo']; ?></td>
			<td><?php echo $taxi['telefono_contacto']; ?></td>
			<td><?php echo $taxi['meses']; ?></td>
			<td><?php echo $taxi['fecha_creacion']; ?></td>
			<td><?php echo $taxi['fecha_ultimo_pago']; ?></td>
			<td><?php echo $taxi['visitas']; ?></td>
			<td><?php echo $taxi['marca_id']; ?></td>
			<td><?php echo $taxi['usuario_id']; ?></td>
			<td><?php echo $taxi['estado_id']; ?></td>
			<td><?php echo $taxi['archivo_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'taxis', 'action' => 'view', $taxi['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'taxis', 'action' => 'edit', $taxi['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'taxis', 'action' => 'delete', $taxi['id']), null, __('Are you sure you want to delete # %s?', $taxi['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Taxi'), array('controller' => 'taxis', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
