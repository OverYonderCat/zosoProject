<?php

namespace Zoso\Service\Navigation;

use Zend\Mvc\Router\Http\TreeRouteStack,
	Zend\Navigation\Page\Mvc,
	Zend\Navigation\Navigation;
	

abstract class AbstractNavigation
{
	
	protected $router = null;
	
	protected $container = null;
	
	public function setRouter(TreeRouteStack $router)
	{
		$this->router = $router;
	}
	
	public function getNavigation()
	{
		Mvc::setDefaultRouter($this->router);
		return new Navigation($this->getContainer());
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
	
	abstract protected function getContainer();
}