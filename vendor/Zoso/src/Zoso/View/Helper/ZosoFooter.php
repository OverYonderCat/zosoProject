<?php

namespace Zoso\View\Helper;

use Zend\Form\View\Helper\AbstractHelper;

class ZosoFooter extends AbstractHelper
{
	public function __invoke()
	{
		$partialHelper = $this->getView()->getHelperPluginManager()->get('partial');
		return $partialHelper('zoso/templates/layout/footer.phtml');
	}
}