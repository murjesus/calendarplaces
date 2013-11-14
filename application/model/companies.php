<?php


class Model_Companies
{
	protected $model = 'companies';
	protected $adapter;

	public function __construct()
	{
		
		$adaptername = __CLASS__."_".$this->model.$_SESSION['register']['adapter'];
		
		
		$this->adapter = new $adaptername();	
	}
	
	public function selectAll()
	{
		return $this->adapter->select();
	}
	
	

}