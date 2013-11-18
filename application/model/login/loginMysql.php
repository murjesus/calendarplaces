<?php

class Model_Login_LoginMysql extends Abstract_Mysql
{
	
	public function getCredentials($identity, $credentials)
	{
<<<<<<< HEAD
=======
		// Clean already done
		//$identity = mysqli_real_escape_string($this->linkread, $identity);
		//$credentials = mysqli_real_escape_string($this->linkread, $credentials);
>>>>>>> d43830c35126e4e491951501240576c5d578a809
		$users=array();
		$sql="SELECT * FROM users 
				WHERE email='".$identity."' AND
					  password='".$credentials."'";
<<<<<<< HEAD
		
=======
	
>>>>>>> d43830c35126e4e491951501240576c5d578a809
		$result=mysqli_query($this->linkread,$sql);
		if($result)
		while($row=mysqli_fetch_assoc($result))
		{
			$users[]=$row;
		}
		
<<<<<<< HEAD
		if(count($users)===1)
			return true;
=======
		if(count($users)===1 && !empty($users))
			return $users[0];
>>>>>>> d43830c35126e4e491951501240576c5d578a809
		else
			return false;
		
	}
	
	public function singup()
	{
		
	}
	
}