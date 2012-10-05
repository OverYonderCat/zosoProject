<?php

return array(
	'zoso' => array(
		'navigation' => array(
			'settings' => array(
				'addAdminLink' => true	
			),
			'adminnavigation' => array(
				array(
					'label' => 'Pages',
					'type'    => 'mvc',
					'route' => 'zoso-admin',
					'params' => array(
						'controller' => 'page',
						'action' => 'list'		
					)
				),
				array(
					'label' => 'Blocks',
					'type'    => 'mvc',
					'route' => 'zoso-admin',
					'params' => array(
						'controller' => 'block',
						'action' => 'list'		
					)
				),
				array(
					'label'		=> 'Switch to Frontend',
					'type'		=> 'mvc',
					'route'		=> 'home'		
				)
			)
		)	
	),
	'controllers' => array(
        'invokables' => array(
            'page'		=> 'Zoso\Controller\PageController',
        	'admin'	=> 'Zoso\Controller\AdminController'
        ),
    ),
	'router' => array(
		'routes' => array(
			'zoso-slug' => array(
				'type'		=> 'Segment',
				'priority'	=> 10,
				'options'	=> array(
					'route'			=> '/[:slug]',
					'constraints'	=> array(
						'slug'	=> '.{2,}'		
					),
					'defaults'		=> array(
						'controller'	=> 'page',
						'action'		=> 'display',
						'slug'			=> 'startpage'		
					)		
				)		
			),
			'zoso-admin' => array(
				'type'		=> 'Segment',
				'priority'	=> 20,
				'options'	=> array(
					'route'		=> '/zosoAdmin[/:controller[/:action[/:id]]]',
					'constraints' => array(
						'controller'	=> '[a-zA-Z][a-zA-Z0-9_-]*',
						'action'		=> '[a-zA-Z][a-zA-Z0-9_-]*',
						'id'			=> '[0-9]*'
					),
					'defaults'	=> array(
						'controller'	=> 'admin',
						'action'		=> 'index'		
					)		
				),
				'may_terminate' => true
			)		
		)		
	),
	'service_manager' => array(
		'invokables' => array(
			'zoso-navigation-factory' => 'Zoso\Service\Navigation\NavigationFactory'		
		)	
	),
	'view_manager' => array(
		'template_map' => array(
			'layout/layout'           => __DIR__ . '/../../../public/zoso/templates/layout/layout.phtml'
		),
		'template_path_stack' => array(
			__DIR__ . '/../view',
			__DIR__ . '/../../../public'
		),
	),
	'translator' => array(
		'locale' => 'de_DE',
	),
	'doctrine' => array(
		'driver' => array(
			'Zoso_driver' => array(
				'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
				'cache' => 'array',
				'paths' => array(__DIR__ . '/../src/Zoso/Entity')
			),
			'orm_default' => array(
				'drivers' => array(
					'Zoso\Entity' => 'Zoso_driver'
				)
			)
		)
	)
);