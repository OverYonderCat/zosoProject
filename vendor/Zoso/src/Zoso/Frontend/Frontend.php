<?php

namespace Zoso\Frontend;

use Zend\Mvc\MvcEvent,
	Doctrine\ORM\EntityManager;

class Frontend {
	
	protected $em;
	
	protected $event;
	
	public function __construct()
	{
		
	}
	
	public function setEntityManager(EntityManager $em)
	{
		$this->em = $em;
	}
	
	public function getEntityManager()
	{
		return $this->em;
	}
	
	public function setEvent(MvcEvent $event)
	{
		$this->event = $event;
	}
	
	public function getEvent()
	{
		return $this->event;
	}
	
	public function run()
	{
		// fetch slug from routematch
		$slug = $this->event->getRouteMatch()->getParam('slug');
		// fetch pageEntity via slug
		$pageRepository = $this->em->getRepository('Zoso\Entity\Page');
		$pageEntity = $pageRepository->fetchBySlug($slug);
		$page = new Page($pageEntity);
		var_dump($page);
	}
}