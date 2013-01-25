<?php
App::uses('AppModel', 'Model');
/**
 * Conductor Model
 *
 * @property Taxi $Taxi
 */
class Conductor extends TaxiAppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'cedula' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Este campo no puede estar vacio',	
			),
			'maxlength' => array(
				'rule' => array('maxlength', 12),
				'message' => 'máximo 12 caracteres',
			),
			'custom' => array(
				'rule' => '/^[1-9E]{1,2}-[0-9]{3,4}-[0-9]{3,4}+$/i',
				'message' => 'No tiene el formato correcto',
			),
			'isUnique' => array(
				'rule' => array('isUnique'),
				'message' => 'La cédula introducido ya existe',
				'required' => TRUE,
			),
		),
		'nombre' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Este campo no puede estar vacio',	
			),
			'maxlength' => array(
				'rule' => array('maxlength', 15),
				'message' => 'Máximo 15 letras',
			),
		),
		'apellido' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Este campo no puede estar vacio',	
			),
			'maxlength' => array(
				'rule' => array('maxlength', 15),
				'message' => 'Máximo 15 letras',
			),
		),
		'celular' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Solo pueden ser número',
			),
			'maxlength' => array(
				'rule' => array('maxlength', 8),
				'message' => 'Máximo 8 caracteres',
				'required' => false,
			),
		),
		'image' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Este campo no puede estar vacio',	
			),
		)
	);
	public $hasAndBelongsToMany = array(
        'Taxi' =>
            array(
                'className'              => 'Taxi',
                'joinTable'              => 'conductores_taxis',
                'foreignKey'             => 'conductor_id',
                'associationForeignKey'  => 'taxi_id',
                'unique'                 => true,
       ));
	
	//The Associations below have been created with all possible keys, those that are not needed can be removed


}
