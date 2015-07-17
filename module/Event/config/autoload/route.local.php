<?php
return array(
    'router' => array(
        'routes' => array(
            'get-events' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/events/get',
                    'defaults' => array(
                        'controller' => 'Event\Controller\Index',
                        'action' => 'get',
                    ),
                ),
            ),
        ),
    ),
);