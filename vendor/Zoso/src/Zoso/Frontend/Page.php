<?php

namespace Zoso\Frontend;

use Zend\View\Model\ViewModel;

class Page implements PageInterface
{
	
	protected $pageEntity;
	
	public function __construct($pageEntity)
	{
		$this->pageEntity = $pageEntity;
	}
	
	public function createViewModel()
	{
		if(empty($this->pageEntity)) {
			$blockData = array();
		} else {
			$blockComposite = new BlockComposite();
			foreach($this->pageEntity->getBlocks()->toArray() as $blockEntity) {
				$classname = '\\Zoso\Frontend\\' . $blockEntity->getClassname();
				$block = new $classname($blockEntity);
				$blockComposite->addBlock($block);
			}
			$blockData = $blockComposite->render();
		}
		return new ViewModel(array(
			'blocks' => $blockData
		));
	}
	
}