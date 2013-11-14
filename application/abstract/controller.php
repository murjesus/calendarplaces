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