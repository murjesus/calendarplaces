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
	
	public function signin($identity, $credentials)
	{
		
		$user=$this->adapter->getCredentials($identity, $credentials);
		echo "<pre>user:";
		print_r($user);
		echo "</pre>";
		if(count($user)===1)
		{
			$objetcUser = new Entity_User($user);
			$_SESSION['user']=$objetcUser;
			return true;
		}
		else
			return false;
	}
	
	public function signup()
	{
		
	}

}



























