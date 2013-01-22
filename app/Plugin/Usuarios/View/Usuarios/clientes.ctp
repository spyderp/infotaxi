<h2><?php echo __('Listado Clientes'); ?></h2>

 <?php 
$fields = array(
        array(
            'title' => __('ID', true),
            'sort' => true,
            'model' => 'Usuario',
            'field' => 'id',
        	'class'=>'idtd'
        ),
        array(
            'title' => __('Correo-e', true),
            'sort' => true,
            'model' => 'Usuario',
            'field' => 'email',
        ),
         array(
            'title' => __('Nombre', true),
            'sort' => true,
            'model' => 'Usuario',
            'field' => 'nombre_completo',
        ),
        array(
            'title' => __('Rol', true),
            'sort' => true,
            'model' => 'Rol',
            'field' => 'nombre',
        ),
        array(
            'title' => __('Telefono', true),
            'sort' => true,
            'model' => 'Usuario',
            'field' => 'telefono',
        ),
        array(
            'title' => __('celular', true),
            'sort' => true,
            'model' => 'Usuario',
            'field' => 'celular',
        ),
        array(
            'title' => __('Último acceso', true),
            'sort' => true,
            'model' => 'Usuario',
            'field' => 'ultimo_acceso',
        ),
        array(
            'title' => __('Activo', true),
            'sort' => true,
            'model' => 'Usuario',
            'field' => 'activo',
        	'format' => 'yesNoOption',
        ),
        array(
            'title' => __('Acciones', true),
            'type' => 'actions',
       		 'class' => 'actions',
        	'class' => 'actions',
            'actions' => array(
               array(
               	   'link' => '/usuarios/view/',
                   'params' => array(
                       array('model' => 'Usuario', 'field' => 'id'),
                   ),
                   'type' => 'view',
               ),
               array(
               	   'link' => '/usuarios/editCliente/',
                   'params' => array(
                       array('model' => 'Usuario', 'field' => 'id'),
                   ),
                   'type' => 'edit',
               ),
                array(
               	   'link' => '/usuarios/deleteCliente/',
                   'params' => array(
                       array('model' => 'Usuario', 'field' => 'id'),
                   ),
                   'type' => 'delete',
               ),
            )
          )
    );  
    $options = array('pagPosition'=>true );
    
    echo $this->Grid->generate($fields, $usuarios, $options); 
?>


