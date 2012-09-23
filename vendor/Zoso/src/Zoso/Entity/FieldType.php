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
 * @ORM\Table(name="fieldtype")
 *
 */
class FieldType extends BaseEntity
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
	protected $inputType;
	
	/**
	 * @ORM\Column(type="string")
	 */
	protected $defaultValue;
	
	/**
	 * @ORM\Column(type="string")
	 */
	protected $options;
	
	public function getId()
	{
		return $this->id;
	}
	
	public function setId($id)
	{
		$this->id = (int)$id;
		return $this;
	}
	
	public function getInputType()
	{
		return $this->inputType;
	}
	
	public function setInputType($inputType)
	{
		$this->inputType = $inputType;
		return $this;
	}
	
	public function getDefaultValue()
	{
		return $this->inputType;
	}
	
	public function setDefaultValue($defaultValue)
	{
		$this->defaultValue = $defaultValue;
		return $this;
	}
	
	public function getOptions()
	{
		return $this->inputType;
	}
	
	public function setOptions($options)
	{
		$this->options = $options;
		return $this;
	}
	
}