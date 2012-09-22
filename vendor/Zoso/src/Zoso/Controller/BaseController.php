<?php

namespace Zoso\Controller;

use Zend\Mvc\Controller\AbstractActionController;

class BaseController extends AbstractActionController
{
	
	/**
	 * @var Doctrine\ORM\EntityManager
	 */
	protected $em = null;
	
	public function getEntityManager()
	{
		if($this->em === null) {
			$this->em = $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');
		}
		return $this->em;
	}
	
}