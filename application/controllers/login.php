<?php

class Controllers_Login extends Abstract_Controller
{

	Protected $viewParams = array();
	Protected $layout = 'login';
	
	
	public function indexAction()
	{
		header('Location: /login/login');
	}
	
	public function loginAction()
	{

// 		echo "<pre>";
// 		print_r(htmlspecialchars($_POST['email']));
// 		echo "</pre>";
		
// 		echo "<pre>";
// 		print_r($_SERVER);
// 		echo "</pre>";

		
		
		
		$recaptcha = new Zend_Service_ReCaptcha($_SESSION['register']['key.public'], 
												$_SESSION['register']['key.private']);
		
		$token = md5(session_id().$_SERVER['HTTP_USER_AGENT']);
		
		$this->viewParams['token']=$token;
			
		
		
		$this->viewParams['captcha']=$recaptcha->getHTML();
		if($_POST)
		{
			if (isset($_POST['signup']))
			{
				header('Location: /login/signup'); 
				exit;
			}	
			
			$user = new Model_Login();
			
			$result = $recaptcha->verify(
					$_POST['recaptcha_challenge_field'],
					$_POST['recaptcha_response_field']
			);
			
			if($token !== $this->request['post']['csrf'])
			{
				header('Location: /login/login');
				exit;
			}
// 			if (!$result->isValid()) {
// 				header('Location: /login/login'); 
// 				exit;
// 			}
			if ($user->signin($this->request['post']['email'], $this->request['post']['password']))
			{
				session_regenerate_id();
				header('Location: /backend'); 
				exit;
			}
			else
			{
				header('Location: /login/login'); 
				exit;
			}
			
		}
		
		
	}
	public function logoutAction()
	{
		unset($_SESSION['user']);
		session_regenerate_id();
		header('Location: /');
		exit;
	}
	
	public function signupAction()
	{
		
	}
	
	
	
}
