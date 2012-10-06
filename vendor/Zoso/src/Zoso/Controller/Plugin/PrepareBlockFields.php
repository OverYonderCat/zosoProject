<?php

namespace Zoso\Controller\Plugin;


use Zend\Mvc\Controller\Plugin\AbstractPlugin;

class PrepareBlockFields extends AbstractPlugin
{
	public function __invoke($fields)
	{
		return $fields;
	}
}