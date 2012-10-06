<?php

namespace Zoso\Controller;

use Zend\View\Model\ViewModel;

class PageController extends BaseController
{
	
	public function displayAction()
	{
		$slug = $this->event->getRouteMatch()->getParam('slug');
		$pageArray = $this->getEntityManager()->getRepository('Zoso\Entity\Page')->fetchBySlug($slug);
		$view = new ViewModel();
		if($pageArray) {
			foreach($pageArray['blocks'] as $block) {
				$blockModel = new ViewModel(array(
					'pageId'		=> $pageArray['id'],
					'blockId'		=> $block['id'],
					'blockLabel'	=> $block['label'],
					'fields'		=> $this->prepareFieldArray($block['fields'], $block['blocktype'])
				));
				$blockModel->setTemplate('zoso/templates/blocks/' . $block['blocktype']['templateFile']);
				$view->addChild($blockModel, $block['blocktype']['name']);
			}
		}
		return $view;
	}
	
	public function listAction()
	{
		$pages = $this->getEntityManager()->getRepository('Zoso\Entity\Page')->fetchNavigationArray();
		return new ViewModel(array(
			'pages' => $pages		
		));
	}
	
	private function prepareFieldArray($fields, $blocktype)
	{
		$indexFields = array();
		for($i = 0; $i < count($fields); ++$i) {
			$indexFields[strtolower($blocktype['fieldmaps'][$i]['label'])] = $fields[$i];
		}
		return $indexFields;
	}
	
	
	
}