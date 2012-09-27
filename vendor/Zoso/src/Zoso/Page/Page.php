<?php

namespace Zoso\Page;

use Zend\View\Model\ViewModel;
use Zoso\Block\Block;

class Page
{
	
	protected $pageData;
	
	public function __construct($pageData)
	{
		$this->pageData = $pageData;
	}
	
	public function getPageModel()
	{
		$blocksArray = array();
		if(!empty($this->pageData)) {
			foreach($this->pageData['blocks'] as $blockData) {
				$block = new Block($blockData);
				$blocksArray[$blockData['id']] = $block->getHtml();
			}
		}
		return new ViewModel(array('blocks' => $blocksArray));
	}
	
}