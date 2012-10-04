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
        	)
        );

    }

    public function getServiceConfig()
    {
    	return array(
    		'factories' => array(
    			'Navigation' => function($sm) {
    				$zosoNavigation = $sm->get('zoso-navigation');
    				$zosoNavigation->setEntityManager($sm->get('doctrine.entitymanager.ormdefault'));
    				$zosoNavigation->setRouter($sm->get('router'));
    				return $zosoNavigation->getNavigation();
    			},
    			'AdminNavigation' => function($sm) {
    				$zosoAdminNavigation = $sm->get('zoso-admin-navigation');
    				$zosoAdminNavigation->setRouter($sm->get('router'));
    				$config = $sm->get('config');
    				$zosoAdminNavigation->setConfig($config['zoso']['adminnavigation']);
    				return $zosoAdminNavigation->getNavigation();
    			},
    		)
    	);   
    }
}

