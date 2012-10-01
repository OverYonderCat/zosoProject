<?php

namespace Zoso\Service;

use Zend\Mvc\Router\Http\TreeRouteStack;
use Doctrine\ORM\EntityManager;

class Navigation
{

	protected $em;
	
	protected $routeStack;
	
	protected $container;
	
	public function __construct()
	{}
	
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
		}
		return $this->container;
	}
	
}