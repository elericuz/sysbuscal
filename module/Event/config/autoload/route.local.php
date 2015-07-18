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
            'create-event' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/events/create',
                    'defaults' => array(
                        'controller' => 'Event\Controller\Index',
                        'action' => 'create',
                    ),
                ),
            ),
            'update-time-event' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/events/update-time',
                    'defaults' => array(
                        'controller' => 'Event\Controller\Index',
                        'action' => 'updatetime',
                    ),
                ),
            ),
        ),
    ),
);