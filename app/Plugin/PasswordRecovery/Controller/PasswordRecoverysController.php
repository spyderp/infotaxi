<?php
App::uses('PasswordRecoveryAppController', 'PasswordRecovery.Controller');
App::uses('CakeEmail', 'Network/Email');
class PasswordRecoverysController extends PasswordRecoveryAppController {
	
	public $components = array('Auth');
	
	protected $_actionsAllow = array('reset', 'token');
	function beforeFilter() {
   		$this->Auth->allow('reset','token');
   		parent::beforeFilter();
	}
	function reset() {		
		$this->layout = 'login';
	
		$loginAction = array_merge($this->Auth->loginAction, array('plugin' => ''));
		$className = Configure::read('PasswordRecovery.className') ? Configure::read('PasswordRecovery.className') : 'User';
		$emailField = Configure::read('PasswordRecovery.emailField') ? Configure::read('PasswordRecovery.emailField') : 'email' ;
		$this->set(compact('className', 'emailField'));
		
		if (!empty($this->request->data)) {
			$email = $this->request->data[$className][$emailField];
			$conditions = array($className . '.' . $emailField => $email);
		
			if ($this->PasswordRecovery->$className->find('count', array('conditions' => $conditions)) == 0) {
				$this->PasswordRecovery->$className->invalidate($emailField);
				$this->_setMessage('Verifique los errores abajo.', parent::ERROR);
			}else {
				$this->PasswordRecovery->saveTemp($email);
				$token = $this->PasswordRecovery->field('email_token', array('user_id' => $this->PasswordRecovery->id));
				$this->_sendMail('email', $email, $token);	
				$this->_setMessage('La verificación de cambio de contraseña ha sido enviada a su email.');
				$this->redirect('/');
			}
		}
	}
	
	function token($type = 'email') {
		$loginAction = array_merge($this->Auth->loginAction, array('plugin' => ''));
		if(isset($this->passedArgs['1'])){
			$token = $this->passedArgs['1'];
		} else {
			$this->_setMessage('Token inválido.', parent::ERROR);
			$this->redirect($this->Auth->loginAction);
		}

		if($type === 'email') {
			$data = $this->PasswordRecovery->validateToken($token);
		} elseif($type === 'reset') {
			$data = $this->PasswordRecovery->validateToken($token, true);
		} else {
			$this->redirect($loginAction);
		}
		$className = Configure::read('PasswordRecovery.className') ? Configure::read('PasswordRecovery.className') : 'User';
		$emailField = Configure::read('PasswordRecovery.emailField') ? Configure::read('PasswordRecovery.emailField') : 'email' ;
		$passwordField = Configure::read('PasswordRecovery.passwordField') ? Configure::read('PasswordRecovery.passwordField') : 'password' ;
		if($data !== false){
			$email = $data[$className][$emailField];
			$password = $data[$className][$passwordField];
			$data = $this->Auth->hashPasswords($data);
			unset($data[$className][$emailField]);
			if($this->PasswordRecovery->save($data, array('validate' => false))) {
				if($type === 'reset'){
					$this->loadModel($className);
					$this->Usuario->save($data, false);
					$this->_sendMail('reset', $email, $password);
					$this->_setMessage('Su contraseña fue enviada a su email.');
					$this->redirect($loginAction);
				} else {
					$this->_setMessage('Su email fue validado. Ya puede iniciar sesión.');
					$this->redirect($loginAction);
				}
			} else {
				$this->_setMessage('Hubo un error en la validación. Verifique su correo electrónico', parent::WARNING);
				$this->redirect($loginAction);
			} 
		}else {
			$this->_setMessage('Data incorrecta', parent::WARNING);
			$this->redirect($loginAction);
		}
	}
	
	private function _sendMail($type = 'reset', $email, $data = null) {
		if($type=='reset'):	
			$email=array(
				'to'=>$email,
				'subject'=>'SHDITIC Reset Password Nueva Contraseña',
				'template'=>'reset',
				'data'=>array('contrasena'=>$data)
			);
		else:
			$email=array(
				'to'=>$email,
				'subject'=>'SHDITIC Actualizar nueva contraseña',
				'template'=>'password',
				'data'=>array('url'=>LIVESITE . 'token/reset/'. $data)
			);
		endif;
		$this->PasswordRecovery->setEmail($email);
	}
	
}
?>
