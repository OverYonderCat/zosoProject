<?php

return array(
	'controllers' => array(
        'invokables' => array(
            'zoso-page' => 'Zoso\Controller\PageController',
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
						'slug'	=> '.*'		
					),
					'defaults'		=> array(
						'controller'	=> 'zoso-page',
						'action'		=> 'display',
						'slug'			=> 'startpage'		
					)		
				)		
			)		
		)		
	),
	'view_manager' => array(
		'template_map' => array(
		//	'layout/layout'           => __DIR__ . '/../../../public/zoso/templates/layout/layout.phtml'
		),
		'template_path_stack' => array(
			__DIR__ . '/../view',
			__DIR__ . '/../../../public'
		),
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