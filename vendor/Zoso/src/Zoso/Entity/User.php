<?php

namespace Zoso\Entity;

use Doctrine\ORM\Mapping as ORM,
	Zend\InputFilter\InputFilter,
	Zend\InputFilter\Factory as InputFactory,
	Zend\InputFilter\InputFilterAwareInterface,
	Zend\InputFilter\InputFilterInterface;

/**
 * User
 *
 * @ORM\Entity
 * @ORM\Table(name="user")
 *
 */
class User extends \ZfcUser\Entity\User implements InputFilterAwareInterface
{
	
	
	public function getInputFilter()
	{
		
	}
	
	public function setInputFilter(InputFilterInterface $inputFilter)
	{
		throw new \Exception('not in use');
	}
	
}