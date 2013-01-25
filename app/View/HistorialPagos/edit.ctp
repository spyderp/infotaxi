<div class="historialPagos form">
<?php echo $this->Form->create('HistorialPago'); ?>
	<fieldset>
		<legend><?php echo __('Edit Historial Pago'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('monto');
		echo $this->Form->input('fecha');
		echo $this->Form->input('taxi_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('HistorialPago.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('HistorialPago.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Historial Pagos'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Taxis'), array('controller' => 'taxis', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Taxi'), array('controller' => 'taxis', 'action' => 'add')); ?> </li>
	</ul>
</div>
