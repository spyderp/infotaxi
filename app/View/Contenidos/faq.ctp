<article>
<?php
     echo $this->Formato->titulo(__('Preguntas frecuentes', true)); 
?>
<ol>
<?php
	foreach($contenidos as $contenido){
		echo "<li><span class='ancla' href='".$contenido['Contenido']['id']."'>".$contenido['Contenido']['titulo']."</span></li>";
	}
?>
</ol>
<?php
	foreach($contenidos as $contenido){
?>
	<a id="ancla-<?php echo $contenido['Contenido']['id'];?>">
		<h4><?php echo $contenido['Contenido']['titulo'];?></h4></a>
		<p><?php echo $contenido['Contenido']['contenido'];?></p>
	
<?php	
	}
?>
</article>