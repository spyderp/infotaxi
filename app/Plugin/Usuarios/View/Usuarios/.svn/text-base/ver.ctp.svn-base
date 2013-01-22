<h2>Vista de Usuario</h2>
<?php $siNo = array(0 => __('No', true), 1 => __('Sí', true)); ?>

<table width="90%" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td class="label-view"><?php __('ID')?></td>
		<td><?php echo $usuario['Usuario']['id']; ?></td>
	</tr>
	<tr>
		<td class="label-view"><?php __('Nombre'); ?></td>
		<td><?php echo $usuario['Usuario']['nombre'] . ' ' . $usuario['Usuario']['apellido'];?></td>
	</tr>
	<tr>
		<td class="label-view"><?php __('Dirección'); ?></td>
		<td><?php echo $usuario['Direccion']['nombre']; ?></td>
	</tr>
	<tr>
		<td class="label-view"><?php __('Email'); ?></td>
		<td><?php echo $usuario['Usuario']['email']; ?></td>
	</tr>
	<tr>
		<td class="label-view"><?php __('Activo')?></td>
		<td><?php echo $siNo[$usuario['Usuario']['activo']]; ?></td>
	</tr>
	<tr>
		<td class="label-view"><?php __('Teléfonos')?></td>
		<td>
		<?php
			foreach ($usuario['PhonesPhone'] as $phone) {
				$phoneType = (isset($phone['PhoneType']['name'])) ? $phone['PhoneType']['name'] : '';
				echo '<div>';
				echo '<span class="phone-type-view">' . $phoneType . ': </span>';
				echo '<span class="phone-numbe-viewr">' . $phone['number'] . '</span>';
				echo '</div>';
			} 
		?>
		</td>
	</tr>
</table>