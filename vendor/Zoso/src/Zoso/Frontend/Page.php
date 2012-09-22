<?php

namespace Zoso\Frontend;

class Page implements PageInterface
{
	
	protected $entity;
	
	public function __construct($entity)
	{
		$this->entity = $entity;
	}
	
	
	public function render()
	{
		$blockComposite = new BlockComposite();
	}
	
}