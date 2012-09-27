<?php

namespace Zoso\Block;

use Zend\View\Model\ViewModel,
	Zend\View\Renderer\PhpRenderer,
	Zend\View\Resolver;

class Block implements BlockInterface
{
	
	protected $blockData;
	
	public function __construct($blockData)
	{
		$this->blockData = $blockData;
	}
	
	public function getData()
	{
		return $this->blockData;
	}
	
	public function setData($blockData)
	{
		$this->blockData = $blockData;
		return $this;
	}
	
	public function getHtml()
	{
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
		
		/*
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
		*/
	}
	
}