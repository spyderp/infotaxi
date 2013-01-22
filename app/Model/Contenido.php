<?php
App::uses('CakeEmail', 'Network/Email');
App::uses('AppModel', 'Model');
/**
 * HistorialPago Model
 *
 * @property Taxi $Taxi
 */
class Contenido extends AppModel {
	
	public function contacto($data)
	{
		$email=array(
				'to'=>$data['Contacto']['correo'],
				'subject'=>'INFOTAXI::Contacto',
				'template'=>'contacto',
				'data'=>$data['Contacto'],
			);
		return($this->setEmail($email))?true:false;
	}
}