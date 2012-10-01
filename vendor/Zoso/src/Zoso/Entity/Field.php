<?php

namespace Zoso\Entity;

use Doctrine\ORM\Mapping as ORM,
Doctrine\Common\Collections\ArrayCollection,
Zend\InputFilter\InputFilter,
Zend\InputFilter\Factory as InputFactory,
Zend\InputFilter\InputFilterAwareInterface,
Zend\InputFilter\InputFilterInterface;

/**
 * Field
 *
 * @ORM\Entity
 * @ORM\Table(name="field")
 *
 */
class Field extends BaseEntity
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
	protected $label;
	
	/**
	 * @ORM\Column(type="string")
	 */
	protected $value;
	
	/**
	 * @ORM\Column(type="string")
	 */
	protected $defaultValue;
	
	/**
	 * @ORM\Column(type="string")
	 */
	protected $options;
	
	/**
	 * @ORM\ManyToOne(targetEntity="FieldType", cascade={"all"}, fetch="EAGER")
	 */
	protected $fieldtype;
	
	/**
	 * @ORM\ManyToOne(targetEntity="Block", inversedBy="fields")
	 */
	protected $block;

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
	
	public function getValue()
	{
		return $this->value;
	}
	
	public function setValue($value)
	{
		$this->value = $value;
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
	
	public function getBlockType() {
		return $this->block;
	}
	
	public function setBlockType($block) {
		$this->block = $block;
		return $this;
	}
	
	public function getFieldType() {
		return $this->fieldtype;
	}
	
	public function setFieldType($fieldtype) {
		$this->fieldtype = $fieldtype;
		return $this;
	}
	
}
