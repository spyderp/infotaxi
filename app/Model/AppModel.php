<?php
/**
 * Application model for Cake.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Model
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Model', 'Model');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
class AppModel extends Model {
	/**
	 * Función para envio de notificaciones vía email
	 */
	public function setEmail($option){
    	$Email = new CakeEmail('default');
		$Email->template($option['template'])->emailFormat('html');
		if(isset($option['from'])):
			$Email->from($option['from']);
		endif;
		
		$Email->cc($option['to']);
		$Email->subject($option['subject']);
		if(isset($option['data'])):
			$Email->viewVars($option['data']);
		endif;
		$Email->send();
		return true;	
    }
	
}
