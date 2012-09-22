<?php

namespace Zoso\Frontend;

use Zend\View\Model\ViewModel;

class Page implements PageInterface
{
	
	protected $entity;
	
	public function __construct($entity)
	{
		$this->entity = $entity;
	}
	
	
	public function createViewModel()
	{
		$blockComposite = new BlockComposite();
		return new ViewModel();
	}
	
}