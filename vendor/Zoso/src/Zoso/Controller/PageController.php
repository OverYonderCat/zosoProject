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
					'fields' => $block->getBlockType()->getFields()	
				));
				$blockModel->setTemplate('zoso/templates/blocks/' . $templateFile);
				// add blockmodel to viewmodel
				$view->addChild($blockModel, $block->getBlockType()->getName());
			}
		}
		return $view;
	}
	
	
	
}

/**

$slug = $this->event->getRouteMatch()->getParam('slug');
// fetch pageEntity via slug
$pageRepository = $this->em->getRepository('Zoso\Entity\Page');
$pageEntity = $pageRepository->fetchBySlug($slug);
$page = new Page($pageEntity);
return $page->getPageModel();

if($this->blockData === null) {
	throw new \Exception('method getHtml() cannot be called without $blockData');
}

$blockName		= $this->blockData['blocktype']['name'];
$templateFile	= $this->blockData['blocktype']['templateFile'];
$fields			= $this->blockData['blocktype']['fields'];

$publicPath 	= realpath(__DIR__ . '/../../../../../public/templates/blocks');
$defaultPath	= realpath(__DIR__ . '/../../../view/zoso/templates/blocks');
$templatePath	= (is_file($publicPath . '/' . $templateFile)) ? $publicPath . DIRECTORY_SEPARATOR . $templateFile : $defaultPath . DIRECTORY_SEPARATOR . $templateFile;
$templateMap	= array(
		'blockTemplate'	=> $templatePath
);
$resolver		= new Resolver\TemplateMapResolver($templateMap);
$renderer		= new PhpRenderer();
$renderer->setResolver($resolver);
$viewModel		= new ViewModel();
$viewModel->setTemplate('blockTemplate');
$viewModel->setVariables(array(
		'name'		=> $blockName,
		'fields' 	=> $fields
));
return $renderer->render($viewModel);
**/