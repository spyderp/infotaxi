<?php
class PasswordRecovery extends PasswordRecoveryAppModel {
	
	public $name = 'PasswordRecovery';
	public $useTable = 'password_recovery';
	public $primaryKey = 'user_id';
	public $actsAs = array('Containable');
	
	function __construct($id = false, $table = null, $ds = null) {
		parent::__construct($id, $table, $ds);
		$this->_bindUserModel();
	}
	
	private function _bindUserModel() {
		$className = Configure::read('PasswordRecovery.className');
		$this->bindModel(array(
			'belongsTo' => array(
				$className => array(
					'className' => $className,
					'foreignKey' => 'user_id'
				)	
			)
		));
	}
	
	private function _genpassword($length = 10) {
		$password = '';
		while(!$this->mediumPassword($password)){
			if(strlen($password)>10){
				$password='';
			}
			$letter=rand(48,122);
			if(!($letter>57 && $letter<65) &&  !($letter>90 && $letter<97)){
				$password .= chr($letter);
			}
		}
		return $password;
	}

	private function _generateKey() {
		$possible = "0123456789abcdfghijklmnopqrstvwxyz";
		$id = "";
		$i = 0;
		while ($i < 20) {
			$char = substr($possible, mt_rand(0, strlen($possible)-1), 1);
			if (!strstr($id, $char)) {
				$id .= $char;
				$i++;
			}
		}
		return $id;
	}

	function saveTemp($email){
		$className = Configure::read('PasswordRecovery.className') ? Configure::read('PasswordRecovery.className') : 'User';
		$emailField = Configure::read('PasswordRecovery.emailField') ? Configure::read('PasswordRecovery.emailField') : 'email' ;
		$this->data['PasswordRecovery']['user_id'] = $this->$className->field('id', array($className .  '.' . $emailField => $email));
		$this->data['PasswordRecovery']['temppassword'] = $this->_genpassword();
		$this->data['PasswordRecovery']['email_token'] = $this->_generateKey();
		$sixtyMins = time() + 43000;
		$this->data['PasswordRecovery']['email_token_expires'] = date('Y-m-d H:i:s', $sixtyMins);
		if($this->save($this->data)){
			return true;
		} else {
			return false;
		}
	}

	private function _password($compareTo, $password, $check = true){
		$security = Security::getInstance();
		if($check === true){
			if($security->hash($password) === $compareTo){
				return true;
			} else {
				return false;
			}
		} else {
			$genPassword = $security->hash($password);
			return $genPassword;
		}
	}

	function validateToken($id = null, $reset = false) {
		$className = Configure::read('PasswordRecovery.className') ? Configure::read('PasswordRecovery.className') : 'User';
		$emailField = Configure::read('PasswordRecovery.emailField') ? Configure::read('PasswordRecovery.emailField') : 'email' ;
		$passwordField = Configure::read('PasswordRecovery.passwordField') ? Configure::read('PasswordRecovery.passwordField') : 'password' ;
		$data = false;
		$conditions = array('PasswordRecovery.email_token' => $id);
		$fields = array('PasswordRecovery.user_id', 'PasswordRecovery.temppassword', 'PasswordRecovery.email_token_expires', $className . '.' . $emailField);
		$match = $this->find('first', array('conditions' => $conditions, 'fields' => $fields));
		if(!empty($match)){
			$expires = strtotime($match['PasswordRecovery']['email_token_expires']);
			if($expires > time()){
				$data[$className]['id'] = $match['PasswordRecovery']['user_id'];
				$data[$className][$emailField] = $match[$className][$emailField];
				$data['PasswordRecovery']['email_authenticated'] = '1';
				if($reset === true) {
					$data[$className][$passwordField] = $match['PasswordRecovery']['temppassword'];
					$data[$className]['password_confirm'] = $match['PasswordRecovery']['temppassword'];
					$data['PasswordRecovery']['temppassword'] = null;
				}
				$data['PasswordRecovery']['email_token'] = '';
				$data['PasswordRecovery']['email_token_expires'] = null;
				$data['PasswordRecovery']['user_id'] = $match['PasswordRecovery']['user_id'];
			}
			return $data;
		} else {
			return $data;
		}
	}
	
	function saveAll($data = null, $options = array()) {
		$className = Configure::read('PasswordRecovery.className') ? Configure::read('PasswordRecovery.className') : 'User';
		$this->begin();
		if (isset($data['PasswordRecovery'])) {
			if (!$this->save($data)) {
				$this->rollback();
				return false;
			}
		}
		if (isset($data[$className])) {
			if (!$this->$className->save($data)) {
				$this->rollback();
				return false;
			}
		}
		$this->commit();
		
		return true;
		
	}
	public function mediumPassword($check) {
		$hasLetters = preg_match("/[a-zA-Z]/", $check);
    	$hasNumbers = preg_match("/[0-9]/", $check);
    	$hasCasing = preg_match("/[a-z]+.*[A-Z]+|[A-Z]+.*[a-z]/", $check);
    	$hasCount=(strlen($check)>6)? 1 : 0;
    	return ($hasLetters && $hasNumbers && $hasCasing && $hasCount);
	}
	
}
?>