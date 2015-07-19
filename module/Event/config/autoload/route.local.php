<?php
return array(
    'router' => array(
        'routes' => array(
            'get-all-events' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/events/get-all',
                    'defaults' => array(
                        'controller' => 'Event\Controller\Index',
                        'action' => 'getall',
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
            'update-event' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/events/update',
                    'defaults' => array(
                        'controller' => 'Event\Controller\Index',
                        'action' => 'update',
                    ),
                ),
            ),
            'get-event' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/events/get[/:event_id]',
                    'constraints' => array(
                        'event_id'  => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Event\Controller\Index',
                        'action' => 'get',
                    ),
                ),
            ),
        ),
    ),
);