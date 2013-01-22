<h2><?php echo __('Listado de Marcas'); ?></h2>

 <?php 
$fields = array(
        array(
            'title' => __('ID', true),
            'sort' => true,
            'model' => 'Marca',
            'field' => 'id',
        	'class'=>'idtd'
        ),
        array(
            'title' => __('Nombre', true),
            'sort' => true,
            'model' => 'Marca',
            'field' => 'nombre',
        ),
        array(
            'title' => __('Acciones', true),
            'type' => 'actions',
       		 'class' => 'actions',
        	'class' => 'actions',
            'actions' => array(
               array(
               	   'link' => '/marcas/edit/',
                   'params' => array(
                       array('model' => 'Marca', 'field' => 'id'),
                   ),
                   'type' => 'edit',
               ),
                array(
               	   'link' => '/marcas/delete/',
                   'params' => array(
                       array('model' => 'Marca', 'field' => 'id'),
                   ),
                   'type' => 'delete',
               ),
            )
          )
    );  
    $options = array('pagPosition'=>true );
    
    echo $this->Grid->generate($fields, $marcas, $options); 
?>


