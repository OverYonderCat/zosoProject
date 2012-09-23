<?php

namespace Zoso\Frontend;

use Zoso\Entity\Block;

abstract class AbstractBlock
{
	protected $blockEntity;
	
	public function __construct(Block $blockEntity)
	{
		$this->blockEntity = $blockEntity;
	}
	
	abstract public function render();
}