<?php
App::uses('AppModel', 'Model');
/**
 * User Model
 *
 * @property Group $Group
 */
class User extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'code' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => 'No puede ser nulo',
				'allowEmpty' => false,
			)
		),
		'group_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Debe pertenecer a un grupo',
				'allowEmpty' => false,
			),
		),
		'name' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => 'Escriba un nombre',
				'allowEmpty' => false,
			),
		),
		'zipcode' => array(
			'postal' => array(
				'rule' => array('postal'),
				'message' => 'Codigo postal valido',
				'allowEmpty' => true,
				'required' => false,
			),
		),
	);

	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Group' => array(
			'className' => 'Group',
			'foreignKey' => 'group_id',
		)
	);

/**
 *  getAgents method
 * Extrae todos los agentes
 * @return array
 */
	public  function getAgents()
	{
		return $this->find(
				'all',
				[
				'fields'  => ['id','code','name'],
				'conditions' => ['group_id' => 1],
				]);
	}

}
