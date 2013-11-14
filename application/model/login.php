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
		return $this->adapter->getCredentials($identity, $credentials);
	}
	
	public function signup()
	{
		
	}

}