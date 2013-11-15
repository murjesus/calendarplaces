<?php

class Model_Users_UsersMysql extends Abstract_Mysql
{
	
	public function getRol($id)
	{
		// Clean already done
		//$identity = mysqli_real_escape_string($this->linkread, $identity);
		//$credentials = mysqli_real_escape_string($this->linkread, $credentials);
		$users=array();
		$sql="SELECT * FROM companies 
				WHERE contact_id=".$id;
	
		$result=mysqli_query($this->linkread,$sql);
		if($result)
		while($row=mysqli_fetch_assoc($result))
		{
			$users[]=$row;
		}
		
		if(!empty($users))
			return 'admin';	// Is admin
		else
			return 'user';	// Is user
		
	}
	
	public function singup()
	{
		
	}
	
}