<?php

namespace Zoso\Service\Navigation;

use Doctrine\ORM\EntityManager;

class Site extends AbstractNavigation
{

	protected $entityManager = null;

	public function __construct(EntityManager $entityManager = null, TreeRouteStack $router = null, $config = null)
	{
		$this->entityManager = $entityManager;
		$this->router = $router;
		$this->config = $config;
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
			$settings = $this->config['settings'];
			if(!$settings['addAdminLink']) {
				$container[] = array(
						'label'		=> 'Admin',
						'type'		=> 'mvc',
						'route'		=> 'zoso-admin'
				);
			}
			$this->container = $container;
		}
		return $this->container;
	}

}