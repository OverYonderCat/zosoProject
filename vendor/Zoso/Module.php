<?php

namespace Zoso;

use Zend\ModuleManager\ModuleManager;
use Zend\Mvc\MvcEvent;
use Zend\ModuleManager\ModuleEvent;
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
		$eventManager	= $moduleManager->getEventManager();
		$sharedManager	= $eventManager->getSharedManager();
		$sharedManager->attach('Zend\Mvc\Application', MvcEvent::EVENT_DISPATCH, array($this, 'checkAuthentication'));
	}
	
	public function checkAuthentication(MvcEvent $e)
	{
		$matchedRouteName = $e->getRouteMatch()->getMatchedRouteName();
		if($matchedRouteName === 'zoso-admin') {
			// user would like to access admin-panel, check for authentication
			$target = $e->getTarget();
			if(!$target->zfcUserAuthentication()->hasIdentity()) {
				$target->redirect()->toRoute('zfcuser/login');
			}
			$target->layout('zoso/templates/layout/admin.phtml');
		}
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
        return array(
        	'invokables' => array(
        		// helpers for "public-templates"
        		'zosoFooter' => 'Zoso\View\Helper\ZosoFooter',
        		// "internal-templates"
        		'pageInspector' => 'Zoso\View\Helper\PageInspector',		
        	)
        );

    }

    public function getServiceConfig()
    {
    	return array(
    		'factories' => array(
    			'Navigation' => function($sm) {    				
    				$zosoNavigationFactory = $sm->get('zoso-navigation-factory');
    				return $zosoNavigationFactory->createService($sm);
    			},
    			'AdminNavigation' => function($sm) {
    				$zosoNavigationFactory = $sm->get('zoso-navigation-factory');
    				$zosoNavigationFactory->setName('zosoAdminNavigation');
    				return $zosoNavigationFactory->createService($sm);
    			},
    		)
    	);   
    }
}

