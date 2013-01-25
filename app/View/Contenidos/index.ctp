
<?php
     echo $this->Formato->titulo(__('Preguntas frecuentes', true)); 
     $fields = array(
        array(
            'title' => __('Id', true),
            'sort' => true,
            'model' => 'Contenido',
            'field' => 'id',
        	'class'=>'idtd'
        ),
        array(
            'title' => __('Titulo', true),
            'sort' => true,
            'model' => 'Contenido',
            'field' => 'titulo',
        ),
        array(
            'title' => __('Contenido', true),
            'sort' => true,
            'model' => 'Contenido',
            'field' => 'contenido',
        ),
        array(
            'title' => __('Acciones', true),
            'type' => 'actions',
        	'class'=>'actions',
            'actions' => array(
               array(
               	   'link' => '/contenidos/edit/',
                   'params' => array(
                       array('model' => 'Contenido', 'field' => 'id'),
                   ),
                   'type' => 'edit',
               ),
               array(
                   'link' => '/contenidos/delete/',
                   'params' => array(
                       array('model' => 'Contenido', 'field' => 'id'),
                   ),
                   'type' => 'delete',

               ),
            )
          )
    );  
    $options = array(
    	'pagination'=>false,
        'links' => array(
            array('type' => 'add', 'title' => __('Agregar Contenido', true), 'link' => '/contenidos/add'),
        ),
    );
    echo $this->Grid->generate($fields, $contenidos, $options);  
?>