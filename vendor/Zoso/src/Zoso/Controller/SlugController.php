<?php

namespace Zoso\Controller;

use Zend\View\Helper\ViewModel,
	Zoso\Frontend\Frontend;

class SlugController extends BaseController
{
	
	public function processAction()
	{
		// initiate Zoso\Frontend
		$frontend = new Frontend();
		$frontend->setEntityManager($this->getEntityManager());
		$frontend->setEvent($this->getEvent());
		$frontend->run();
		
		var_dump($frontend);
		
		
		return new ViewModel();		
	}
	
	
	
	
}