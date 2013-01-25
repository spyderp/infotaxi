<?php
App::uses('AppModel', 'Model');
/**
 * Marca Model
 *
 * @property Taxi $Taxi
 */
class Marca extends TaxiAppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'nombre' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Este campo no puede estar vacio',	
			),
			'alphanumeric' => array(
				'rule' => array('alphanumeric'),
				'message' => 'Solo puede usar letras y números',
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Taxi' => array(
			'className' => 'Taxi',
			'foreignKey' => 'marca_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
