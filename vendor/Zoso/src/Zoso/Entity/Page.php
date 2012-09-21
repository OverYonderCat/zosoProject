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
 * @ORM\Entity(repositoryClass="Zoso\Repository\PageRepository")
 * @ORM\Table(name="page")
 *
 */
class Page {
	
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
	protected $slug;
	
	/**
	 * @ORM\ManyToMany(targetEntity="Block")
	 * @ORM\JoinTable(name="page_block")
	 */
	protected $blocks;
	
	public function __construct()
	{
		$this->blocks = new ArrayCollection();
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
	
	public function getSlug()
	{
		return $this->slug;
	}
	
	public function setSlug($slug)
	{
		$this->slug = $slug;
		return $this;
	}
	
	public function getBlocks()
	{
		return $this->blocks;
	}
	
	public function setBlocks(ArrayCollection $blocks)
	{
		$this->blocks = $blocks;
	}
	
	public function getArrayCopy()
	{
		return get_object_vars($this);
	}
	
}

?>