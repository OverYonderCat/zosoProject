<?php

return array(
	'doctrine' => array(
		'connection' => array(
			'orm_default' => array(
				'driverClass' => 'Doctrine\DBAL\Driver\PDOMySql\Driver',
				'params' => array(
					'host' 		=> 'host',
					'port' 		=> '3306',
					'user'		=> 'username',
					'password'	=> 'password',
					'dbname'	=> 'dbname',
					'charset'	=> 'utf8'		
				)		
			)		
		)		
	)	
);