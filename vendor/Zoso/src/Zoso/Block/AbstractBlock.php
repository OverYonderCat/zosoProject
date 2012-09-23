<?php

namespace Zoso\Block;

use Zoso\Entity\Block as BlockEntity;

abstract class AbstractBlock
{
	
	protected $blockEntity;
	
	public function __construct(BlockEntity $blockEntity)
	{
		$this->blockEntity = $blockEntity;
	}
	
	abstract public function getHtml();
}