<?php
class Controllers_Companies extends Abstract_Controller
{
	
	Protected $viewParams = array();
	Protected $layout = 'backend';
	
	
	

	
	
	public function indexAction()
	{
		
		$companies = new Model_Companies();
		if ($companies->selectAll())
		{
			echo "rellenamos tabla con todas las compañias";
		}
		else
		{
			echo "no hay ninguna compañia en la base de datos";
		}
	}
	
	


	
}