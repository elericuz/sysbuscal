<?php
return array(
    'router' => array(
        'routes' => array(
            'home' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Index',
                        'action'     => 'index',
                    ),
                ),
            ),
            'dashboard' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/dashboard',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Index',
                        'action' => 'dashboard',
                    ),
                ),
            ),
            'list-groups' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/groups',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Group',
                        'action' => 'list',
                    ),
                ),
            ),
            'create-group' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/groups/create',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Group',
                        'action' => 'create',
                    ),
                ),
            ),
            'edit-group' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/groups/edit',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Group',
                        'action' => 'edit',
                    ),
                ),
            ),
            'delete-group' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/groups/delete[/:id]',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Group',
                        'action' => 'delete',
                        'id' => '[0-9]+',
                    ),
                ),
            ),
            'view-group' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/groups/view[/:id]',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Group',
                        'action' => 'view',
                        'id' => '[0-9]+',
                    ),
                ),
            ),
            'add-person-group' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/groups/person/add',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Group',
                        'action' => 'addPerson',
                    ),
                ),
            ),
            'delete-person-group' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/groups/person/delete[/:group/:id]',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Group',
                        'action' => 'deletePerson',
                        'group' => '[0-9]+',
                        'id' => '[0-9]+',
                    ),
                ),
            ),
        ),
    ),
);