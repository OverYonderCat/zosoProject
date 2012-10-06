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
class Page extends BaseEntity
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
	protected $route;
	
	/**
	 * @ORM\Column(type="string")
	 */
	protected $slug;
	
	/**
	 * @ORM\ManyToOne(targetEntity="Page", inversedBy="children")
	 * @ORM\JoinColumn(name="parent_id", referencedColumnName="id")
	 */
	protected $parent;
	
	/**
	 * @ORM\ManyToMany(targetEntity="Block")
	 * @ORM\JoinTable(name="pages_blocks")
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
	
	public function getRoute()
	{
		return $this->route;
	}
	
	public function setRoute($route)
	{
		$this->route = $route;
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

	public function getParent()
	{
		return $this->parent;
	}
	
	public function setParent($parent)
	{
		$this->parent = $parent;
		return $this;
	}
}