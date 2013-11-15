<?php

class Model_Login_LoginMysql extends Abstract_Mysql
{
	
	public function getCredentials($identity, $credentials)
	{
		// Clean already done
		//$identity = mysqli_real_escape_string($this->linkread, $identity);
		//$credentials = mysqli_real_escape_string($this->linkread, $credentials);
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
		
		if(count($users)===1 && !empty($users))
			return $users[0];
		else
			return false;
		
	}
	
	public function singup()
	{
		
	}
	
}