<?php
	


function radioForm($name, $data, $userdata)
{
	echo "<pre>";
	print_r($userdata);
	echo "</pre>";
	
	
	$html='';
	foreach ($data as $key => $value)
	{
		$html.=$value.": ";
		$html.="<input type=\"radio\" name=\"".$name."\"";
		$html.="value=\"".$key."\""; 
		
		if(isset($userdata[$name])&&$userdata[$name]==$key)
			$html.='checked';
		else
			$html.='';
		
		$html.="/>";
		
	}
	

	return $html;
}




/*
Sexo:
M: <input type="radio" name="gender" value="m" <?=(isset($user[7])&&$user[7]=="m")?'checked':'';?> />
H: <input type="radio" name="gender" value="h" <?=(isset($user[7])&&$user[7]=="h")?'checked':'';?> />
O: <input type="radio" name="gender" value="o" <?=(isset($user[7])&&$user[7]=="o")?'checked':'';?>/>
*/















