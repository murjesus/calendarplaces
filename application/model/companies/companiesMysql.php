<?php

class Model_Companies_CompaniesMysql extends Abstract_Mysql
{
	
	public function select()
	{
		$companies=array();
		$sql="SELECT * FROM companies";
		
		$result=mysqli_query($this->linkread,$sql);
		if($result)
		while($row=mysqli_fetch_assoc($result))
		{
			$companies[]=$row;
		}
		
		if(count($companies)>0)
			return true;
		else
			return false;
		
	}
	
	
	
}