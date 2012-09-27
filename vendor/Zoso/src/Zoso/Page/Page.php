<?php

namespace Zoso\Page;

use Zend\View\Model\ViewModel;
use Zoso\Block\Block;

class Page
{
	
	protected $pageEntity;
	
	public function __construct($pageEntity)
	{
		$this->pageEntity = $pageEntity;
	}
	
	public function getPageModel()
	{
		$blockData = array();
		if(!empty($this->pageEntity)) {
			foreach($this->pageEntity->getBlocks()->toArray() as $blockEntity) {
				$block = new Block($blockEntity);
				$blockData[$blockEntity->getId()] = $block->getHtml();
			}
		}
		return new ViewModel(array('blocks' => $blockData));
	}
	
}