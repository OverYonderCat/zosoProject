<?php

namespace Zoso\Controller;

use Zend\View\Helper\ViewModel;

class FrontController extends BaseController
{
	
	public function processAction()
	{
		// fetch slug from routematch
		$slug = $this->getEvent()->getRouteMatch()->getParam('slug');
		// fetch pageEntity via slug
		$pageRepository = $this->getEntityManager()->getRepository('Zoso\Entity\Page');
		$page = $pageRepository->fetchBySlug($slug);
		// initiate Zoso\Application
		// set PageEntity
		// load blocks
		// run Applicationyou
		
		// cause our application will do all the renderin
		// we just return a empty viewmodel so content gets wrapped
		// with layout
		return new ViewModel();		
	}
	
	
	
	
}