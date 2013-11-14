<?php

class Model_Login_LoginMysql extends Abstract_Mysql
{
	
	public function getCredentials($identity, $credentials)
	{
		$users=array();
		$sql="SELECT * FROM users 
				WHERE email='".$identity."' AND
					  password='".$credentials."'";
		
		$result=mysqli_query($this->linkread,$sql);
		if($result)
		while($row=mysqli_fetch_assoc($result))
		{
			$users[]=$row;
		}
		
		if(count($users)===1)
			return true;
		else
			return false;
		
	}
	
	public function singup()
	{
		
	}
	
}