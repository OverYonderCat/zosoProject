<?php

namespace Zoso\Frontend;

class BlockComposite
{
	protected $blocks;
	
	public function addBlock(BlockInterface $block)
	{
		$this->blocks[] = $block;
	}
	
	public function removeBlock(BlockInterface $block)
	{
		$key = array_search($block, $this->blocks);
		if($key === false) return;
		unset($this->blocks[$key]);
		return true;
	}
	
	public function render()
	{
		$result = array();
		if(!empty($this->blocks)) {
			foreach($this->blocks as $block) {
				$result[] = $block->render();
			}
		}
		return $result;
	}
}