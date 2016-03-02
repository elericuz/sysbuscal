<?php
return array(
    'router' => array(
        'routes' => array(
            'patient-search' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/patient/search',
                    'defaults' => array(
                        'controller' => 'Patient\Controller\Search',
                        'action'     => 'search',
                    ),
                ),
            ),
        ),
    ),
);