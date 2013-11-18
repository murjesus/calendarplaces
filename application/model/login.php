<?php


class Model_Login
{
	protected $model = 'Login';
	protected $adapter;

	public function __construct()
	{
		
		$adaptername = __CLASS__."_".$this->model.$_SESSION['register']['adapter'];
		
		
		$this->adapter = new $adaptername();	
	}
	
<<<<<<< HEAD
	public function singin($identity, $credentials)
	{
		return $this->adapter->getCredentials($identity, $credentials);
	}
	
	public function singup()
=======
	public function signin($identity, $credentials)
	{
		
		$user=$this->adapter->getCredentials($identity, $credentials);
	
		if(!empty($user))
		{
			$objetcUser = new Entity_User($user);
			$_SESSION['user']=$objetcUser;
			return true;
		}
		else
			return false;
	}
	
	public function signup()
>>>>>>> d43830c35126e4e491951501240576c5d578a809
	{
		
	}

<<<<<<< HEAD
}
=======
}



























>>>>>>> d43830c35126e4e491951501240576c5d578a809
