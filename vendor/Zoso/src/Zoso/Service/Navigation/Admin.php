<?php

namespace Zoso\Service\Navigation;

use Doctrine\ORM\EntityManager;

class Admin extends AbstractNavigation
{

	public function __construct(TreeRouteStack $router = null, $config = null)
	{
		$this->router = $router;
		$this->config = $config;
	}
	
	protected function getContainer()
	{
		if($this->container === null) {
			$this->container = $this->config['adminnavigation'];
		}
		return $this->container;
	}

}