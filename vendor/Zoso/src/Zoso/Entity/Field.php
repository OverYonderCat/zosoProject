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
	 * @ORM\OneToOne(targetEntity="BlockType")
	 * @ORM\JoinColumn(name="blocktype_id", referencedColumnName="id")
	 */
	protected $blocktype_id;
	
	/**
	 * @ORM\OneToOne(targetEntity="FieldType")
	 * @ORM\JoinColumn(name="fieldtype_id", referencedColumnName="id")
	 */
	protected $fieldtype_id;

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
	
	public function getBlockTypeId() {
		return $this->blocktype_id;
	}
	
	public function setBlockTypeId($blocktype_id) {
		$this->blocktype_id = $blocktype_id;
		return $this;
	}
	
	public function getFieldTypeId() {
		return $this->fieldtype_id;
	}
	
	public function setFieldTypeId($fieldtype_id) {
		$this->fieldtype_id = $fieldtype_id;
		return $this;
	}
}
