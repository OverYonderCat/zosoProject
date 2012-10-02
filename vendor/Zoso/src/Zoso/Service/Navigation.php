<?php

namespace Zoso\Service;

use Zend\Mvc\Router\Http\TreeRouteStack;
use Doctrine\ORM\EntityManager;

class Navigation
{

	protected $em;
	
	protected $routeStack;
	
	protected $container;
	
	public function __construct(EntityManager $entityManager = null, TreeRouteStack $routeStack = null)
	{
		$this->em = $entityManager;
		$this->routeStack = $routeStack;
	}
	
	public function setEntityManager(EntityManager $entityManager)
	{
		$this->em = $entityManager;
	}
	
	public function setRouteStack(TreeRouteStack $routeStack)
	{
		$this->routeStack = $routeStack;
	}
	
	public function getNavigation()
	{
		\Zend\Navigation\Page\Mvc::setDefaultRouter($this->routeStack);
		return new \Zend\Navigation\Navigation($this->getContainer());
	}
	
	protected function getContainer()
	{
		if($this->container === null) {
			// fetch data from entity and prepare as container
			$this->container = array();
			// testcontainer
			$this->container = array(
				array(
					'label' => 'test2',
					'type'	=> 'mvc',
					'route' => 'zoso-slug',
					'module' => 'zoso',
					'controller' => 'page',
					'action'	=> 'display',
					'params'=> array('slug' => 'testslug')
				)
			);
		}
		return $this->container;
	}
	
}