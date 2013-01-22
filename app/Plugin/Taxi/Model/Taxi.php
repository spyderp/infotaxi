<?php
/**
 * Taxi Model
 *
 * @property Marca $Marca
 * @property Usuario $Usuario
 * @property Estado $Estado
 * @property Conductor $Conductor
 * @property HistorialPago $HistorialPago
 * @property Queja $Queja
 */
class Taxi extends TaxiAppModel {
	public $actsAs = array('Containable');
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'registro_unico' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Este campo no puede estar vacio',
			),
			'maxlength' => array(
				'rule' => array('maxlength',10),
				'message' => 'Solo pueden ser 10 caracteres',
			),
			'isUnique' => array(
				'rule' => array('isUnique'),
				'message' => 'Este dato ya existe en el sistema, contactese con la administración',
				'required' => TRUE,
			),
		),
		'numero_chasis' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Este campo no puede estar vacio',
			),
			'maxlength' => array(
				'rule' => array('maxlength',18),
				'message' => 'Solo puede poner 18 caracteres maximo',
			),
			'isUnique' => array(
				'rule' => array('isUnique'),
				'message' => 'Este dato ya existe en el sistema, contactese con la administración',
				'required' => TRUE,
			),
		),
		'placa_carro' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Solo pueden ser número',
			),
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Este campo no puede estar vacio',	
			),
			'maxlength' => array(
				'rule' => array('maxlength', 7),
				'message' => 'máximo 7 caracteres',
			),
			'isUnique' => array(
				'rule' => array('isUnique'),
				'message' => 'Este dato ya existe en el sistema, contactese con la administración',
				'required' => TRUE,
			),
		),
		'placa_taxi' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Este campo no puede estar vacio',
			),
			'maxlength' => array(
				'rule' => array('maxlength', 7),
				'message' => 'máximo 7 caracteres',
			),
			'isUnique' => array(
				'rule' => array('isUnique'),
				'message' => 'Este dato ya existe en el sistema, contactese con la administración',
				'required' => TRUE,
			),
			'custom'=>array(
				'rule'=>'/^[tTA0-9]+$/i',
				'message'=>'No tiene el formato correcto'
			),
		),
		'modelo' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Este campo no puede estar vacio',
			),
			'alphanumeric' => array(
				'rule' => array('alphanumeric'),
				'message' => 'Solo puede usar letras y números',
			),
		),
		'year' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Este campo no puede estar vacio',	
			),
		),
		'grupo' => array(
			'maxlength' => array(
				'rule' => array('maxlength', 60),
				'message' => 'máximo 60 caracteres',
				'required' => false,
			),
		),
		'telefono_contacto' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Solo pueden ser número',
			),
		),
		'image' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Este campo no puede estar vacio',
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Marca' => array(
			'className' => 'Marca',
			'foreignKey' => 'marca_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Usuario' => array(
			'className' => 'Usuario',
			'foreignKey' => 'usuario_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Estado' => array(
			'className' => 'Estado',
			'foreignKey' => 'estado_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'HistorialPago' => array(
			'className' => 'HistorialPago',
			'foreignKey' => 'taxi_id',
			'dependent' => false,
		),
		'Queja' => array(
			'className' => 'Queja',
			'foreignKey' => 'taxi_id',
			'dependent' => false,
		),
	);
	
		public $hasAndBelongsToMany = array(
        'Conductor' =>
            array(
                'className'              => 'Conductor',
                'joinTable'              => 'conductores_taxis',
                'foreignKey'             => 'taxi_id',
                'associationForeignKey'  => 'conductor_id',
                'unique'                 => true,
       ));

}
