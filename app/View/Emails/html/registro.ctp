<?php echo $this->element('header');?>
<p>
Su registro ha sido realizado en nuestro sistema para continuar es necesario que haga click en el siguiente enlace para completar su registro
enlace: <a href="<?php echo LIVESITE ."activarCuenta/" . $tokken;?>"><?php echo LIVESITE ."activarCuenta/" . $tokken;?></a>
</p>
<?php echo $this->element('footer');?>