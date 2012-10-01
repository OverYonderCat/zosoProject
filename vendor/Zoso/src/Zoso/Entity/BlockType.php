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
	protected $templateFile;
	
	/**
	 * @ORM\ManyToMany(targetEntity="FieldType")
	 * @ORM\JoinTable(name="blocktypes_fieldtypes")
	 */
	protected $fieldTypes;
	
	public function __construct()
	{
		$this->fieldTypes = new ArrayCollection();
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
	
	public function getTemplateFile()
	{
		return $this->templateFile;
	}
	
	public function setTemplateFile($templateFile)
	{
		$this->templateFile = $templateFile;
		return $this;
	}
	
	public function getFieldTypes()
	{
		return $this->fieldTypes;
	}
	
	public function setFieldTypes(ArrayCollection $fieldTypes)
	{
		$this->fieldTypes = $fieldTypes;
		return $this;
	}
}