<article>
<?php
     echo $this->Formato->titulo(__('¿Que es InfoTaxi?', true)); 
?>
<p>Infotaxi es un servicio que le ofrece a la ciudadanía una herramienta por la cual obtener la información 
	del vehículo y el conductor que se encuentre inscrito. Brindando una mayor seguridad a nuestros pasajeros 
	y generar confianza en el uso del servicio te transporte selectivo (TAXI).</p>
<figure style="width: 124px;  margin: 1%; border: 1px solid #666; padding: .5em; float: right; background-color: #5b97bc">
	<img style="width: 100%; height: 100%; border: 1px solid #ccc;" src="http://upload.wikimedia.org/wikipedia/commons/3/3d/QRc%C3%B3digo_portada_wikipedia_espa%C3%B1ol_.png" />
	<figcaption style="color: #fff; font-size: 0.875em; text-align: center; background-color: #888;">
		Ejemplo de código QR
	</figcaption>
</figure>
<p>Nuestros pasajeros podrán acceder a la información de nuestros vehículos al usar su propio celular 
	smarthphone (blackberries, android o iphone) al capturar con su cámara el 
	<a href="http://es.wikipedia.org/wiki/C%C3%B3digo_QR" target="blank" >Código QR</a> ofrecido por nuestro servicio.</p>

<p>El pasajero podrá ver en su pantalla los datos del vehículo como son la placa, el registros único, etc.
	 Además de los datos de los conductores que manejan este vehículo con su nombre, cédula y opcionalmente el 
	 celular del conductor.</p> 

<p>Esta información no sera solamente valiosa para brindar mayor confianza a los pasajeros sino que es una 
	herramienta para resguardar la seguridad del conductor y del vehículo. Ya que en caso de un robo del 
	vehículo, al acceder a la información del taxi por medio de los códigos QR el pasajero sabrá que es una 
	Taxi Robado al verlo en la pantalla de su celular.</p> 
<div align="center">
	<figure style="width: 96%;  margin: 1%; border: 5px solid #666;">
		<?php echo $this->Html->image('infografia.jpg', array('style'=>'width:100%')); ?>
	</figure>
</div>
<p>Si eres un dueño de Taxi y te interesa saber más de lo que te ofrecemos con nuestro servicio puedes acceder
	 a este <a class="pag" href="/servicios">enlace...</a></p>
</article>