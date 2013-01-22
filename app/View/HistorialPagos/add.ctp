<div class="historialPagos form">
<?php echo $this->Form->create('HistorialPago'); ?>
	<fieldset>
		<legend><?php echo __('Add Historial Pago'); ?></legend>
	<?php
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

		<li><?php echo $this->Html->link(__('List Historial Pagos'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Taxis'), array('controller' => 'taxis', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Taxi'), array('controller' => 'taxis', 'action' => 'add')); ?> </li>
	</ul>
</div>
