<?php

namespace Zoso\Entity;

use Doctrine\ORM\Mapping as ORM,
Doctrine\Common\Collections\ArrayCollection,
Zend\InputFilter\InputFilter,
Zend\InputFilter\Factory as InputFactory,
Zend\InputFilter\InputFilterAwareInterface,
Zend\InputFilter\InputFilterInterface;

/**
 * BlockType
 *
 * @ORM\Entity
 * @ORM\Table(name="blocktype")
 *
 */
class BlockType extends BaseEntity
{
	
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;

	/**
	 * @ORM\Column(type="string")
	 */
	protected $name;
	
	/**
	 * @ORM\Column(type="string")
	 */
	protected $classpath;
	
	/**
	 * @ORM\OneToMany(targetEntity="Field", mappedBy="blocktype")
	 */
	protected $fields;
	
	public function __construct()
	{
		$this->fields = new ArrayCollection();
	}

	public function getId()
	{
		return $this->id;
	}
	
	public function setId($id)
	{
		$this->id = (int)$id;
		return $this;
	}
	
	public function getName()
	{
		return $this->name;
	}
	
	public function setName($name)
	{
		$this->name = $name;
		return $this;
	}
	
	public function getClasspath()
	{
		return $this->classpath;
	}
	
	public function setClasspath($classpath)
	{
		$this->classpath = $classpath;
		return $this;
	}
	
	public function getFields()
	{
		return $this->fields;
	}
	
	public function setFields(ArrayCollection $fields)
	{
		$this->fields = $fields;
		return $this;
	}
}