<?php

namespace Zoso\Service\Navigation;

use Doctrine\ORM\EntityManager;

class Admin extends AbstractNavigation
{

	protected $config = null;

	public function __construct($config = null, TreeRouteStack $router = null)
	{
		$this->config = $config;
		$this->router = $router;
	}
	
	public function setConfig($config)
	{
		$this->config = $config;
	}

	protected function getContainer()
	{
		if($this->container === null) {
			$this->container = $this->config;
		}
		return $this->container;
	}

}