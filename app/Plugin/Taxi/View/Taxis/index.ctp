<?php echo $this->Formato->titulo(__('Lista de Taxi', true)); ?>
 <?php 
$fields = array(
        array(
            'title' => __('ID', true),
            'sort' => true,
            'model' => 'Taxi',
            'field' => 'id',
        	'class'=>'idtd'
        ),
        array(
            'title' => __('Registro Unico', true),
            'sort' => true,
            'model' => 'Taxi',
            'field' => 'registro_unico',
        ),
        array(
            'title' => __('Placa', true),
            'sort' => true,
            'model' => 'Taxi',
            'field' => 'placa_carro',
        ),
        array(
            'title' => __('Placa de Taxi', true),
            'sort' => true,
            'model' => 'Taxi',
            'field' => 'placa_taxi',
        ),
        array(
            'title' => __('Teléfono', true),
            'sort' => true,
            'model' => 'Taxi',
            'field' => 'telefono_contacto',
        ),
        array(
            'title' => __('Estado', true),
            'sort' => true,
            'model' => 'Estado',
            'field' => 'nombre',
        ),
        array(
            'title' => __('Último pago', true),
            'sort' => true,
            'model' => 'Taxi',
            'field' => 'fecha_ultimo_pago',
        ),
        array(
            'title' => __('Acciones', true),
            'type' => 'actions',
       		 'class' => 'actions',
        	'class' => 'actions',
            'actions' => array(
            	array(
               	   'link' => '/taxis/view/',
                   'params' => array(
                       array('model' => 'Taxi', 'field' => 'id'),
                   ),
                   'type' => 'view',
               ),
               array(
               	   'link' => '/taxis/edit/',
                   'params' => array(
                       array('model' => 'Taxi', 'field' => 'id'),
                   ),
                   'type' => 'edit',
               ),
                array(
               	   'link' => '/taxis/delete/',
                   'params' => array(
                       array('model' => 'Taxi', 'field' => 'id'),
                   ),
                   'type' => 'delete',
               ),
            )
          )
    );  
    $options = array('pagPosition'=>true );
    
    echo $this->Grid->generate($fields, $taxis, $options); 
?>

