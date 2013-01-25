<?php echo $this->element('header');?>
<p>
Su Cuenta ha sido activada<br>
Nombre: <?php echo $nombre; ?><br>
Correo: <?php echo $correo ?><br>
telefono: <?php echo $telefono; ?><br>
</p>
<p><?php echo $mensaje; ?></p>
<?php echo $this->element('footer');?>