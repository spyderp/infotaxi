<div class="historialPagos view">
<h2><?php  echo __('Historial Pago'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($historialPago['HistorialPago']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Monto'); ?></dt>
		<dd>
			<?php echo h($historialPago['HistorialPago']['monto']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha'); ?></dt>
		<dd>
			<?php echo h($historialPago['HistorialPago']['fecha']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Taxi'); ?></dt>
		<dd>
			<?php echo $this->Html->link($historialPago['Taxi']['id'], array('controller' => 'taxis', 'action' => 'view', $historialPago['Taxi']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Historial Pago'), array('action' => 'edit', $historialPago['HistorialPago']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Historial Pago'), array('action' => 'delete', $historialPago['HistorialPago']['id']), null, __('Are you sure you want to delete # %s?', $historialPago['HistorialPago']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Historial Pagos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Historial Pago'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Taxis'), array('controller' => 'taxis', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Taxi'), array('controller' => 'taxis', 'action' => 'add')); ?> </li>
	</ul>
</div>
