<?php 
class Entity_User
{
	protected $id_user=NULL;
	protected $email='s';
	protected $password=NULL;
	public $name=NULL;
	public $rol;
	
	public function __construct($user)
	{
		
		if(!empty($user))
		{
			if(isset($user['id_user']))		
				$this->setId_user($user['id_user']);
			if(isset($user['email']))
				$this->setEmail($user['email']);
			
			if(isset($user['name']))
				$this->setName($user['name']);
			
			Zend_Debug::dump($user); 
			$this->setRol($user['id_user']);
				
		}
		
		
		return $this;
		
	}
	
	public function setRol($id)
	{
		$user = new Model_Users_UsersMysql();
		$this->rol = $user->getRol($id);
		return;
	}
	
	/**
	 * @return the $id_user
	 */
	public function getId_user() {
		return $this->id_user;
	}

	/**
	 * @return the $email
	 */
	public function getEmail() {
		return $this->email;
	}

	/**
	 * @return the $password
	 */
	public function getPassword() {
		return $this->password;
	}

	/**
	 * @return the $name
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * @param field_type $id_user
	 */
	public function setId_user($id_user) {
		$this->id_user = $id_user;
	}

	/**
	 * @param field_type $email
	 */
	public function setEmail($email) {
		$this->email = $email;
	}

	/**
	 * @param field_type $password
	 */
	public function setPassword($password) {
		$this->password = $password;
	}

	/**
	 * @param field_type $name
	 */
	public function setName($name) {
		$this->name = $name;
	}

	
	
	
	
}


