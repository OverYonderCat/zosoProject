<?php

return array(
	'controllers' => array(
        'invokables' => array(
            'zoso-front' => 'Zoso\Controller\FrontController',
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
						'controller'	=> 'zoso-front',
						'action'		=> 'process',
						'slug'			=> 'startpage'		
					)		
				)		
			)		
		)		
	),
	'view_manager' => array(
		'template_map' => array(
		//	'layout/layout'           => __DIR__ . '/../../../public/templates/layout/layout.phtml'
		),
		'template_path_stack' => array(
			__DIR__ . '/../view',
		),
	),
);