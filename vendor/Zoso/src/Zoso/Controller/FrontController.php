<?php

namespace Zoso\Controller;

use Zend\View\Helper\ViewModel;

class FrontController extends BaseController
{
	
	public function processAction()
	{
		return new ViewModel();		
	}
	
}