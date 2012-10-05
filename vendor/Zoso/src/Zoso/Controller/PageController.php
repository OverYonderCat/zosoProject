<?php

namespace Zoso\Controller;

use Zend\View\Model\ViewModel;

class PageController extends BaseController
{
	
	public function displayAction()
	{
		// fetch slug from routematch
		$slug = $this->event->getRouteMatch()->getParam('slug');
		// fetch pageEntity via slug
		$pageEntity = $this->getEntityManager()->getRepository('Zoso\Entity\Page')->fetchBySlug($slug);
		// create viewModel
		$view = new ViewModel();
		// check if there are blocks existing
		if($pageEntity) {
			// run threw pageblocks
			foreach($pageEntity->getBlocks() as $block) {
				$templateFile = $block->getBlockType()->getTemplateFile();
				$blockModel = new ViewModel(array(
					'pageId' => $pageEntity->getId(),
					'fields' => $this->zosoPrepareBlockFields($block->getFields())	
				));
				$blockModel->setTemplate('zoso/templates/blocks/' . $templateFile);
				// add blockmodel to viewmodel
				$view->addChild($blockModel, $block->getBlockType()->getName());
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
	
	
	
}