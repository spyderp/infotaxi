<div class="taxis view">
<h2><?php  echo __('Taxi'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($taxi['Taxi']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Registro Unico'); ?></dt>
		<dd>
			<?php echo h($taxi['Taxi']['registro_unico']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cupo'); ?></dt>
		<dd>
			<?php echo h($taxi['Taxi']['cupo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Numero Chasis'); ?></dt>
		<dd>
			<?php echo h($taxi['Taxi']['numero_chasis']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Placa Carro'); ?></dt>
		<dd>
			<?php echo h($taxi['Taxi']['placa_carro']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Placa Taxi'); ?></dt>
		<dd>
			<?php echo h($taxi['Taxi']['placa_taxi']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modelo'); ?></dt>
		<dd>
			<?php echo h($taxi['Taxi']['modelo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Year'); ?></dt>
		<dd>
			<?php echo h($taxi['Taxi']['year']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Grupo'); ?></dt>
		<dd>
			<?php echo h($taxi['Taxi']['grupo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Zona Trabajo'); ?></dt>
		<dd>
			<?php echo h($taxi['Taxi']['zona_trabajo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Telefono Contacto'); ?></dt>
		<dd>
			<?php echo h($taxi['Taxi']['telefono_contacto']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Meses'); ?></dt>
		<dd>
			<?php echo h($taxi['Taxi']['meses']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha Creacion'); ?></dt>
		<dd>
			<?php echo h($taxi['Taxi']['fecha_creacion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha Ultimo Pago'); ?></dt>
		<dd>
			<?php echo h($taxi['Taxi']['fecha_ultimo_pago']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Visitas'); ?></dt>
		<dd>
			<?php echo h($taxi['Taxi']['visitas']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Marca'); ?></dt>
		<dd>
			<?php echo $this->Html->link($taxi['Marca']['id'], array('controller' => 'marcas', 'action' => 'view', $taxi['Marca']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Usuario'); ?></dt>
		<dd>
			<?php echo $this->Html->link($taxi['Usuario']['id'], array('controller' => 'usuarios', 'action' => 'view', $taxi['Usuario']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Estado'); ?></dt>
		<dd>
			<?php echo $this->Html->link($taxi['Estado']['id'], array('controller' => 'estados', 'action' => 'view', $taxi['Estado']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Archivo Id'); ?></dt>
		<dd>
			<?php echo h($taxi['Taxi']['archivo_id']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Taxi'), array('action' => 'edit', $taxi['Taxi']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Taxi'), array('action' => 'delete', $taxi['Taxi']['id']), null, __('Are you sure you want to delete # %s?', $taxi['Taxi']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Taxis'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Taxi'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Marcas'), array('controller' => 'marcas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Marca'), array('controller' => 'marcas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Usuarios'), array('controller' => 'usuarios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Usuario'), array('controller' => 'usuarios', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Estados'), array('controller' => 'estados', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Estado'), array('controller' => 'estados', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Conductores'), array('controller' => 'conductores', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Conductor'), array('controller' => 'conductores', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Historial Pagos'), array('controller' => 'historial_pagos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Historial Pago'), array('controller' => 'historial_pagos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Quejas'), array('controller' => 'quejas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Queja'), array('controller' => 'quejas', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Conductores'); ?></h3>
	<?php if (!empty($taxi['Conductor'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Cedula'); ?></th>
		<th><?php echo __('Nombre'); ?></th>
		<th><?php echo __('Apellido'); ?></th>
		<th><?php echo __('Celular'); ?></th>
		<th><?php echo __('Descripcion'); ?></th>
		<th><?php echo __('Taxi Id'); ?></th>
		<th><?php echo __('Archivo Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($taxi['Conductor'] as $conductor): ?>
		<tr>
			<td><?php echo $conductor['id']; ?></td>
			<td><?php echo $conductor['cedula']; ?></td>
			<td><?php echo $conductor['nombre']; ?></td>
			<td><?php echo $conductor['apellido']; ?></td>
			<td><?php echo $conductor['celular']; ?></td>
			<td><?php echo $conductor['descripcion']; ?></td>
			<td><?php echo $conductor['taxi_id']; ?></td>
			<td><?php echo $conductor['archivo_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'conductores', 'action' => 'view', $conductor['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'conductores', 'action' => 'edit', $conductor['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'conductores', 'action' => 'delete', $conductor['id']), null, __('Are you sure you want to delete # %s?', $conductor['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Conductor'), array('controller' => 'conductores', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Historial Pagos'); ?></h3>
	<?php if (!empty($taxi['HistorialPago'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Monto'); ?></th>
		<th><?php echo __('Fecha'); ?></th>
		<th><?php echo __('Taxi Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($taxi['HistorialPago'] as $historialPago): ?>
		<tr>
			<td><?php echo $historialPago['id']; ?></td>
			<td><?php echo $historialPago['monto']; ?></td>
			<td><?php echo $historialPago['fecha']; ?></td>
			<td><?php echo $historialPago['taxi_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'historial_pagos', 'action' => 'view', $historialPago['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'historial_pagos', 'action' => 'edit', $historialPago['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'historial_pagos', 'action' => 'delete', $historialPago['id']), null, __('Are you sure you want to delete # %s?', $historialPago['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Historial Pago'), array('controller' => 'historial_pagos', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Quejas'); ?></h3>
	<?php if (!empty($taxi['Queja'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Nombre'); ?></th>
		<th><?php echo __('Mensaje'); ?></th>
		<th><?php echo __('Fecha'); ?></th>
		<th><?php echo __('Taxi Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($taxi['Queja'] as $queja): ?>
		<tr>
			<td><?php echo $queja['id']; ?></td>
			<td><?php echo $queja['nombre']; ?></td>
			<td><?php echo $queja['mensaje']; ?></td>
			<td><?php echo $queja['fecha']; ?></td>
			<td><?php echo $queja['taxi_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'quejas', 'action' => 'view', $queja['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'quejas', 'action' => 'edit', $queja['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'quejas', 'action' => 'delete', $queja['id']), null, __('Are you sure you want to delete # %s?', $queja['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Queja'), array('controller' => 'quejas', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
