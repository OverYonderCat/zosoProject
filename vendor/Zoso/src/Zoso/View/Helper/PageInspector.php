<?php

namespace Zoso\View\Helper;

use Zend\View\Helper\AbstractHelper;

class PageInspector extends AbstractHelper
{
	public function __invoke($pages)
	{
		$view = $this->getView();
		$view->headScript()->appendFile('/zoso/js/pageInspector.js', 'text/javascript');
		$view->headLink()->appendStylesheet('/zoso/css/pageInspector.css', 'screen');
		$view->inlineScript()->appendScript(
			'$(function() {
				$("#pageInspector").pageInspector();
			});'
		);
		$view->setVars(array(
			'pages' => $pages		
		));
		return $view->render('zoso/templates/helper/pageInspector.phtml');
	}
	
}