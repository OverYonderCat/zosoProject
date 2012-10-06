<?php

namespace Zoso\Controller;

use Zend\View\Model\ViewModel;
use Zend\View\Model\JsonModel;

class PageController extends BaseController
{
	
	public function displayAction()
	{
		// fetch slug from routematch
		$slug = $this->event->getRouteMatch()->getParam('slug');
		// fetch pageArray via slug
		$pageArray = $this->getEntityManager()->getRepository('Zoso\Entity\Page')->fetchBySlug($slug);
		// create viewModel
		$view = new ViewModel();
		// check if there are blocks existing
		if($pageArray) {
			// run threw pageblocks
			foreach($pageArray['blocks'] as $block) {
				$blockModel = new ViewModel(array(
					'pageId'		=> $pageArray['id'],
					'blockId'		=> $block['id'],
					'blockLabel'	=> $block['label'],
					'fields'		=> $this->prepareFieldArray($block['fields'])
				));
				$blockModel->setTemplate('zoso/templates/blocks/' . $block['blocktype']['templateFile']);
				$view->addChild($blockModel, $block['blocktype']['name']);
			}
		}
		return $view;
	}
	
	public function listAction()
	{
		//$this->layout('zoso/templates/layout/admin.phtml');
		$pages = $this->getEntityManager()->getRepository('Zoso\Entity\Page')->fetchNavigationArray();
		return new ViewModel(array(
			'pages' => $pages		
		));
	}
	
	public function getChildrenAction()
	{
		$parentPageId = $this->event->getRouteMatch()->getParam('id');
		// fetch Children by parentid
		$children = $this->getEntityManager()->getRepository('Zoso\Entity\Page')->fetchChildrenById($parentPageId);
		
		if($children) {
			return new JsonModel($children);
		}	
	}
	
	private function prepareFieldArray($fields)
	{
		$indexFields = array();
		foreach($fields as $field) {
			$indexFields[strtolower($field['label'])] = $field;
		}
		return $indexFields;
	}	
}