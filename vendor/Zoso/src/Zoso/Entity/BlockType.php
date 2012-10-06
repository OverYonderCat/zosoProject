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
	 * @ORM\ManyToMany(targetEntity="FieldMap")
	 * @ORM\JoinTable(name="blocktypes_fieldmaps")
	 */
	protected $fieldmaps;
	
	public function __construct()
	{
		$this->fieldmaps = new ArrayCollection();
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
	
	public function getFieldMaps()
	{
		return $this->fieldmaps;
	}
	
	public function setFieldMaps(ArrayCollection $fieldMaps)
	{
		$this->fieldmaps = $fieldMaps;
		return $this;
	}
}