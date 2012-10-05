<?php

namespace Zoso\Service\Navigation;

use Zend\Navigation\Service\AbstractNavigationFactory;
use Zend\ServiceManager\ServiceLocatorInterface;

class NavigationFactory extends AbstractNavigationFactory
{	
	
	protected $name = 'zosoMainNavigation';
	protected $serviceLocator = null;
	
	public function getName()
	{
		return $this->name;
	}
	
	public function setName($name)
	{
		$this->name = $name;
	}
	
	protected function getPages(ServiceLocatorInterface $serviceLocator)
	{
		if (null === $this->pages) {
			$this->serviceLocator = $serviceLocator;
			$methodName = $this->getName();
			$pages = $this->$methodName();
			$application = $serviceLocator->get('Application');
			$routeMatch  = $application->getMvcEvent()->getRouteMatch();
			$router      = $application->getMvcEvent()->getRouter();
			$this->pages = $this->injectComponents($pages, $routeMatch, $router);
		}
		return $this->pages;
	}
	
	protected function zosoMainNavigation()
	{
		$entityManager	= $this->serviceLocator->get('doctrine.entitymanager.ormdefault');
		$config			= $this->serviceLocator->get('config');
		$navArray		= $entityManager->getRepository('Zoso\Entity\Page')->fetchNavigationArray();
		$pages = array();
		foreach($navArray as $page) {
			$pages[] = $this->getPageArray($page);
		}
		if($config['zoso']['navigation']['settings']['addAdminLink']) {
			$pages[] = array(
				'label'	=> 'Admin',
				'type'	=> 'mvc',
				'route'	=> 'zoso-admin'		
			);
		}
		return $pages;
	}
	
	protected function zosoAdminNavigation()
	{
		$config	= $this->serviceLocator->get('config');
		return $config['zoso']['navigation']['adminnavigation'];
	}
		
	protected function getPageArray($page)
	{
		$pageArray = array(
				'label'		=> $page['label'],
				'type'		=> 'mvc',
				'route'		=> $page['route'],
				'params'	=> array(
						'slug'	=> $page['slug']
				)
		);
		if(isset($page['parent'])) {
			$pageArray['pages'] = array();
			foreach($page['parent'] as $subPage) {
				$pageArray['pages'][] = $this->getPageArray($subPage);
			}
		}
		return $pageArray;
	}
	
}