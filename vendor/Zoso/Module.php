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
        		'zosoFooter' => 'Zoso\View\Helper\ZosoFooter'		
        	),
        		'navigation' => array(
        				'default' => array(
        						array(
        								'label' => 'testpagelabel',
        								'type'	=> 'mvc',
        								'route' => 'zoso-slug',
        								'params'=> array('slug' => 'testslug')
        						)
        				)
        		)
        );

    }

    public function getServiceConfig()
    {
    	return array(
    		'factories' => array(
    			'Navigation' => function($sm) {
    				/*
    				$zosoNavigation = $sm->get('zoso-navigation');
    				$zosoNavigation->setEntityManager($sm->get('doctrine.entitymanager.ormdefault'));
    				$zosoNavigation->setRouter($sm->get('router'));
    				$config = $sm->get('config');
    				$zosoNavigation->setConfig($config['zoso']['navigation']);
    				return $zosoNavigation->getNavigation();
    				,
	'navigation' => array(
		'default' => array(
			array(
				'label' => 'testpagelabel',
				'type'	=> 'mvc',
				'route' => 'zoso-slug',
				'params'=> array('slug' => 'testslug')
			)
		)	
	)
	
	I DREH AN FILM!!!
	
	*
	*/
    				
    				
    				
    				$navigationFactory = new \Zend\Navigation\Service\DefaultNavigationFactory();
    				return $navigationFactory->createService($sm);
    			},
    			'AdminNavigation' => function($sm) {
    				$zosoAdminNavigation = $sm->get('zoso-admin-navigation');
    				$zosoAdminNavigation->setRouter($sm->get('router'));
    				$config = $sm->get('config');
    				$zosoAdminNavigation->setConfig($config['zoso']['navigation']);
    				return $zosoAdminNavigation->getNavigation();
    			},
    		)
    	);   
    }
}

