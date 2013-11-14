<?php


abstract class Abstract_Mysql
{
	protected $linkread;
	protected $linkwrite;
	
	public function __construct()
	{
		$this->linkread = $_SESSION['register']['linkread'];
		$this->linkwrite = $_SESSION['register']['linkwrite'];
	}
	
	
}