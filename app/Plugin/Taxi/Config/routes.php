<?php
	Router::connect('/estados/:action', array( 'plugin'=>'taxi', 'controller' => 'estados'));
	Router::connect('/estados', array( 'plugin'=>'taxi', 'controller' => 'estados', 'action'=>'index'));
	Router::connect('/quejas/:action', array( 'plugin'=>'taxi', 'controller' => 'quejas'));
	Router::connect('/quejas', array( 'plugin'=>'taxi', 'controller' => 'quejas', 'action'=>'index'));
	Router::connect('/marcas/:action', array( 'plugin'=>'taxi', 'controller' => 'marcas'));
	Router::connect('/marcas', array( 'plugin'=>'taxi', 'controller' => 'marcas', 'action'=>'index'));
	Router::connect('/conductores/:action', array( 'plugin'=>'taxi', 'controller' => 'conductores'));
	Router::connect('/conductores', array( 'plugin'=>'taxi', 'controller' => 'conductores', 'action'=>'index'));
	Router::connect('/taxis/:action/*', array( 'plugin'=>'taxi', 'controller' => 'taxis'));
	Router::connect('/taxis', array( 'plugin'=>'taxi', 'controller' => 'taxis', 'action'=>'index'));
?>