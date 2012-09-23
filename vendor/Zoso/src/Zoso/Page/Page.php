<?php

namespace Zoso\Page;

use Zend\View\Model\ViewModel;

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
				$classname = $blockEntity->getBlockType()->getClasspath();
				$block = new $classname($blockEntity);
				$blockData[] = $block->getHtml();
			}
		}
		return new ViewModel(array('blocks' => $blockData));
	}
	
}