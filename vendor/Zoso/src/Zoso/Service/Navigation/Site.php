<?php

namespace Zoso\Service\Navigation;

use Doctrine\ORM\EntityManager;

class Site extends AbstractNavigation
{

	protected $entityManager = null;

	public function __construct(EntityManager $entityManager = null, TreeRouteStack $router = null)
	{
		$this->entityManager = $entityManager;
		$this->router = $router;
	}

	public function setEntityManager(EntityManager $entityManager)
	{
		$this->entityManager = $entityManager;
	}

	protected function getContainer()
	{
		if($this->container === null) {
			$pages = $this->entityManager->getRepository('Zoso\Entity\Page')->fetchNavigationArray();
			$container = array();
			foreach($pages as $page) {
				$container[] = $this->getPageArray($page);
			}
			$this->container = $container;
		}
		return $this->container;
	}

}