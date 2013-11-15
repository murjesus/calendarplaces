<?php



/**
 * Read config file to array
 * @param string $filename
 * @return array config
 */
function readConfig($filename, $section)
{
	//Obtener en un array el config.ini
	$config=parse_ini_file($filename, true);
	//Recorrer el array
	foreach($config as $key => $value)
	{
		$array_key=explode(":", $key);
		if($array_key[0]==$section)
		{	
			$config_1=$config[$key];
			if(isset($array_key[1]))
				$config_2=$config[$array_key[1]];
			else
				$config_2=$config_1;	
			break;
		}	
	}
	$config = array_merge($config_2, $config_1);
	
	return $config;
	
}





function getView($action = 'index', $controller = 'index', $viewParams, $config)
{
	ob_start();
	if(isset($viewParams['data']))
		$data=$viewParams['data'];
	//include_once ("../views/radioForm.php");
	include_once($config['views']."/".$controller."/".$action.".phtml");
	$content=ob_get_contents();
	ob_end_clean();
	return $content;
}





function getRequest()
{
	$url=explode('/',$_SERVER['REQUEST_URI']);
	
	foreach ($url as $key => $value)
	{
		if(!isset($url[1]) OR $url[1]=='')
			return array('controller'=>'index',
						 'action'=>'index');
		
		$controller=$url[1];
		
		if(!isset($url[2]) || $url[2]=='')
			$action='index';
		else
			$action=$url[2];
		
		if((sizeof($url)%2)==1)
		if($key%2==1 AND $key>2)
			$params[$value]=$url[$key+1];
	}
	
	if(isset($params))
		return array('controller'=>$controller,
			'action'=>$action,
			'params'=>$params,
			'post'=>getPost($_POST));
	else
		return array('controller'=>$controller,
				'action'=>$action,
				'post'=>getPost($_POST));
}

function getPost()
{
	$cleanPost=array();
	if(isset($_POST))
	{		
		foreach($_POST as $key => $value)
		{
			$cleanPost[$key]=addslashes($value);
		}
	}
	return $cleanPost;
}

//function getGet();




function setLayout($layout, $layoutparams)
{
	$content=$layoutparams['content'];
	include_once("views/layouts/".$layout.".phtml");
}


function renderLayout($layout, $controller, $layoutparams)
{
	ob_start();
		setLayout($layout, $layoutparams);
		$layout=ob_get_contents();
	ob_end_clean();
	
	return $layout;
}







function getLinkRead($config)
{
	$linkRead=mysqli_connect($config['database.serverr'],
			$config['database.usernamer'],
			$config['database.passwordr']
	);

	mysqli_select_db($linkRead,$config['database.dbr'] );
	mysqli_query($linkRead, "SET NAMES 'utf8'");

	return $linkRead;
}

function getLinkWrite($config)
{
	$linkRead=mysqli_connect($config['database.serverw'],
			$config['database.usernamew'],
			$config['database.passwordw']
	);

	mysqli_select_db($linkRead,$config['database.dbw'] );
	mysqli_query($linkRead, "SET NAMES 'utf8'");
	return $linkRead;
}













