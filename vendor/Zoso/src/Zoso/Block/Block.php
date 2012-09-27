<?php

namespace Zoso\Block;

use Zend\View\Model\ViewModel,
	Zend\View\Renderer\PhpRenderer,
	Zend\View\Resolver,
	Zoso\Entity\Block as Entity;

class Block implements BlockInterface
{
	
	protected $entity;
	
	public function __construct(Entity $entity = null)
	{
		$this->entity = $entity;
	}
	
	public function getEntity()
	{
		return $this->entity;
	}
	
	public function setEntity(Entity $entity)
	{
		$this->entity = $entity;
		return $this;
	}
	
	public function getHtml()
	{
		if($this->entity === null) {
			throw new \Exception('method getHtml() cannot be called without a defined entity');
		}
		$blockType = $this->entity->getBlockType();
		$blockName		= $blockType->getName();
		$templateFile	= $blockType->getTemplateFile();
		$fieldsCol		= $blockType->getFields();
		// TODO instead of bypassin' $fieldsCol to $fields
		// created populated array as $fields
		$fields 		= $fieldsCol;
		
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
		$html 			= $renderer->render($viewModel);
		return $html;
	}
	
}