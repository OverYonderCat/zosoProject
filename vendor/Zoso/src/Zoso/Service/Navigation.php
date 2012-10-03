<?php

namespace Zoso\Service;

use Zend\Mvc\Router\Http\TreeRouteStack;
use Doctrine\ORM\EntityManager;

class Navigation
{

	protected $em;

	protected $router;

	protected $container = null;

	public function __construct(EntityManager $entityManager = null, TreeRouteStack $router = null)
	{
		$this->em = $entityManager;
		$this->router = $router;
	}

	public function setEntityManager(EntityManager $entityManager)
	{
		$this->em = $entityManager;
	}

	public function setRouter(TreeRouteStack $router)
	{
		$this->router = $router;
	}

	public function getNavigation()
	{
		\Zend\Navigation\Page\Mvc::setDefaultRouter($this->router);
		return new \Zend\Navigation\Navigation($this->getContainer());
	}

	protected function getContainer()
	{
		if($this->container === null) {
			$pages = $this->em->getRepository('Zoso\Entity\Page')->fetchNavigationArray();
			$container = array();
			foreach($pages as $page) {
				$container[] = array(
					'label'		=> $page['label'],
					'type'		=> 'mvc',
					'route'		=> $page['route'],
					'params'	=> array(
						'slug'	=> $page['slug']		
					)		
				);
			}
			$this->container = $container;
			/*
			// testcontainer
			$this->container = array(
				array(
					'label' => 'test2',
					'type'	=> 'mvc',
					'route' => 'zoso-slug',
					'module' => 'zoso',
					'controller' => 'page',
					'action'	=> 'display',
					'params'=> array(
						'slug' => 'testslug'
					)
				)
			);
			*/
			
		}
		return $this->container;
	}

}