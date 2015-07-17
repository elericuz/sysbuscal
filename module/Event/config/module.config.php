<?php
return array(
    //view manager
	'view_manager'	=> array(
		'template_path_stack'	=> array(
			__DIR__ . '/../view',
		)
	),
	'module_layouts' => array(
			'Event' => array(
					'Index' => array(
							'get'		=> 'layout/json',
					),
			)
	),
);