<?php

namespace Zoso;

use Zend\ModuleManager\ModuleManager;
use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ModuleManager\Feature\ServiceProviderInterface;

class Module implements
    AutoloaderProviderInterface,
    ConfigProviderInterface,
    ServiceProviderInterface
{

	public function init(ModuleManager $moduleManager)
	{
// 		$eventManager = $moduleManager->getEventManager();
// 		$sharedEvents = $eventManager->getSharedManager();
// 		$sharedEvents->attach('Zend\Mvc\Application', 'bootstrap', array($this, 'Appbootstrap'));
// 		$sharedEvents->attach('Zend\Mvc\Application', 'route', array($this, 'Approute'));
// 		$sharedEvents->attach('Zend\Mvc\Application', 'dispatch', array($this, 'Appdispatch'));
// 		$sharedEvents->attach('Zend\Mvc\Controller\ActionController', 'dispatch', array($this, 'Condispatch'));
// 		$sharedEvents->attach('Zend\Mvc\Application', 'render', array($this, 'Apprender'));
// 		$sharedEvents->attach('Zend\View\View', 'renderer', array($this, 'Viewrenderer'));
// 		$sharedEvents->attach('Zend\View\View', 'response', array($this, 'Viewrespone'));
// 		$sharedEvents->attach('Zend\Mvc\Application', 'finish', array($this, 'Appfinish'));
	}
	
	
	public function Appbootstrap($e) {
		echo "Appbootstrap<hr>";
	}
	public function Approute($e) {
		echo "Approute<hr>";
	}
	public function Appdispatch($e) {
		echo "Appdispatch<hr>";
	}
	public function Condispatch($e) {
		echo "Condispatch<hr>";
	}
	public function Apprender($e) {
		echo "Apprender<hr>";
	}
	public function Viewrenderer($e) {
		echo "Viewrenderer<hr>";
	}
	public function Viewrespone($e) {
		echo "Viewrespone<hr>";
	}
	public function Appfinish($e) {
		echo "Appfinish<hr>";
	}
	
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php',
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function getConfig($env = null)
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getViewHelperConfig()
    {
        return array();

    }

    public function getServiceConfig()
    {
        return array(
        	
        );
    }
}

