<?php

namespace Zoso\Entity;

use Doctrine\ORM\Mapping as ORM,
	Doctrine\Common\Collections\ArrayCollection,
	Zend\InputFilter\InputFilter,
	Zend\InputFilter\Factory as InputFactory,
	Zend\InputFilter\InputFilterAwareInterface,
	Zend\InputFilter\InputFilterInterface;

/**
 * Page
 *
 * @ORM\Entity
 * @ORM\Table(name="block")
 *
 */
class Block {
	
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;
	
	/**
	 * @ORM\Column(type="string")
	 */
	protected $label;
	
	/**
	 * @ORM\Column(type="string")
	 */
	protected $classname;
	
	//protected $content;
	
	public function getId()
	{
		return $this->id;
	}
	
	public function setId($id)
	{
		$this->id = (int)$id;
		return $this;
	}
	
	public function getLabel()
	{
		return $this->label;
	}
	
	public function setLabel($label)
	{
		$this->label = $label;
		return $this;
	}
	
	public function getClassname()
	{
		return $this->classname;
	}
	
	public function setClassname($classname)
	{
		$this->classname = $classname;
		return $this;
	}
	
	
	
}

?>