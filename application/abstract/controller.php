<?php


abstract class Abstract_Controller
{
	protected $layout = 'frontend';
	protected $request;
	protected $config;
	
	abstract function indexAction();
	
	
	public function __construct($request, $config)
	{
		$this->request = $request;
		$this->config = $config;
		$this->setLayout($this->layout);
		
		
// 		Zend_Debug::dump($this->request);
		
// 		Zend_Debug::dump($this->config);
		
		Zend_Debug::dump($_SESSION);
		if(isset($_SESSION['user']))
			$acl = explode(',', $this->config['rol'.$_SESSION['user']->rol]);
		else
			$acl = explode(',', $this->config['rol.guest']);
		
// 		Zend_Debug::dump($acl);
		
		
		if(in_array('/'.$this->request['controller'].'/'.$this->request['action'],$acl))
		{
			echo "si";
		}
		else
		{
// 			header('Location: /login/login');
// 			exit;
			echo "no";
		}
		
	}
	
	
	/**
	 * @return the $layout
	 */
	public function getLayout() {
		return $this->layout;
	}

	/**
	 * @param string $layout
	 */
	public function setLayout($layout) {
		$this->layout = $layout;
	}
	
	
	public function __destruct()
	{
		$content=getView($this->request['action'],
				$this->request['controller'],
				$this->viewParams,
				$this->config);
		
		$this->layoutparams=array('content'=>$content);
		
		echo renderLayout($this->getLayout(),
				$this->request['controller'],
				$this->layoutparams);
	}

	
	
}