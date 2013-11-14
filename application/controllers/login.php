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
		echo "<pre>";
		print_r($_POST);
		echo "</pre>";
		
		$recaptcha = new Zend_Service_ReCaptcha($_SESSION['register']['key.public'], 
												$_SESSION['register']['key.private']);
		
		
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
			
			
			if (!$result->isValid()) {
				header('Location: /login/login'); 
				exit;
			}
			if ($user->signin($_POST['email'], $_POST['password']))
			{
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
		
	}
	
	public function signupAction()
	{
		
	}
	
	
	
}
