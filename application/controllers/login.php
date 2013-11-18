<?php

class Controllers_Login extends Abstract_Controller
{

	Protected $viewParams = array();
	Protected $layout = 'login';
	
	
	public function indexAction()
	{
<<<<<<< HEAD
		
=======
		header('Location: /login/login');
>>>>>>> d43830c35126e4e491951501240576c5d578a809
	}
	
	public function loginAction()
	{
<<<<<<< HEAD
=======

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
>>>>>>> d43830c35126e4e491951501240576c5d578a809
		if($_POST)
		{
			if (isset($_POST['signup']))
			{
				header('Location: /login/signup'); 
				exit;
			}	
			
			$user = new Model_Login();
<<<<<<< HEAD
			if ($user->singin($_POST['email'], $_POST['password']))
			{
=======
			
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
>>>>>>> d43830c35126e4e491951501240576c5d578a809
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
<<<<<<< HEAD
		
=======
		unset($_SESSION['user']);
		session_regenerate_id();
		header('Location: /');
		exit;
>>>>>>> d43830c35126e4e491951501240576c5d578a809
	}
	
	public function signupAction()
	{
		
	}
	
	
	
}
