<?php

namespace Zoso\Frontend;

use Zoso\Entity\Block;

class SampleBlock implements BlockInterface
{
	
	protected $blockEntity;
	
	public function __construct(Block $blockEntity)
	{
		$this->blockEntity = $blockEntity;
	}
	
	public function render()
	{
		return 'asdfasdf';
	}
	
	protected function loadContent()
	{
		
	}
}