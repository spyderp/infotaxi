<?php echo $this->Formato->titulo(__('Lista de Estados del Sistema', true)); ?>
 <?php 
$fields = array(
        array(
            'title' => __('ID', true),
            'sort' => true,
            'model' => 'Estado',
            'field' => 'id',
        	'class'=>'idtd'
        ),
        array(
            'title' => __('Nombre', true),
            'sort' => true,
            'model' => 'Estado',
            'field' => 'nombre',
        ),
        array(
            'title' => __('Json Opciones', true),
            'sort' => true,
            'model' => 'Estado',
            'field' => 'opciones',
        ),
        array(
            'title' => __('Acciones', true),
            'type' => 'actions',
       		 'class' => 'actions',
        	'class' => 'actions',
            'actions' => array(
               array(
               	   'link' => '/estados/edit/',
                   'params' => array(
                       array('model' => 'Estado', 'field' => 'id'),
                   ),
                   'type' => 'edit',
               ),
                array(
               	   'link' => '/estados/delete/',
                   'params' => array(
                       array('model' => 'Estado', 'field' => 'id'),
                   ),
                   'type' => 'delete',
               ),
            )
          )
    );  
    $options = array('pagPosition'=>true );
    
    echo $this->Grid->generate($fields, $estados, $options); 
?>
