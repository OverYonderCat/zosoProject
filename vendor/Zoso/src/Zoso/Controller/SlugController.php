<?php

namespace Zoso\Controller;

use Zoso\Frontend\BlockContentTable;

use Zoso\Frontend\Frontend;

class SlugController extends BaseController
{
	
	public function processAction()
	{
		// initiate Zoso\Frontend
		$frontend = new Frontend();
		$frontend->setEntityManager($this->getEntityManager());
		$frontend->setEvent($this->getEvent());
		return $frontend->getSlugModel();
	}
	
	
	
	
}