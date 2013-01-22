<?php echo $this->Formato->titulo(__('Lista de Conductores', true)); ?>
<?php
$fields = array(
        array(
            'title' => __('ID', true),
            'sort' => true,
            'model' => 'Conductor',
            'field' => 'id',
        	'class'=>'idtd'
        ),
        array(
            'title' => __('cedula', true),
            'sort' => true,
            'model' => 'Conductor',
            'field' => 'cedula',
        ),
        array(
            'title' => __('Nombre', true),
            'sort' => true,
            'model' => 'Conductor',
            'field' => 'nombre',
        ),
        array(
            'title' => __('Apellido', true),
            'sort' => true,
            'model' => 'Conductor',
            'field' => 'apellido',
        ),
        array(
            'title' => __('Celular', true),
            'sort' => true,
            'model' => 'Conductor',
            'field' => 'celular',
        ),
        array(
            'title' => __('Acciones', true),
            'type' => 'actions',
       		 'class' => 'actions',
        	'class' => 'actions',
            'actions' => array(
               array(
               	   'link' => '/conductores/edit/',
                   'params' => array(
                       array('model' => 'Conductor', 'field' => 'id'),
                   ),
                   'type' => 'edit',
               ),
                array(
               	   'link' => '/conductores/delete/',
                   'params' => array(
                       array('model' => 'Conductor', 'field' => 'id'),
                   ),
                   'type' => 'delete',
               ),
              ))
    	);  
	    $options = array('pagPosition'=>true );
    
    echo $this->Grid->generate($fields, $conductores, $options); 