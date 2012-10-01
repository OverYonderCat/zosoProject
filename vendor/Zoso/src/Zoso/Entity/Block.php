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
class Block extends BaseEntity
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
	 * @ORM\ManyToOne(targetEntity="BlockType", cascade={"all"}, fetch="EAGER")
	 */
	protected $blocktype;
	
	/**
	 * @ORM\OneToMany(targetEntity="Field", mappedBy="block")
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
	
	public function getLabel()
	{
		return $this->label;
	}
	
	public function setLabel($label)
	{
		$this->label = $label;
		return $this;
	}
	
	public function getBlockType() {
		return $this->blocktype;
	}
	
	public function setBlockType($blocktype) {
		$this->blocktype = $blocktype;
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