<?php
namespace DADummyTest;

use Zend\Mvc\Controller\ControllerManager;

return [
	'router' => array(
        'routes' => array(
        	'dummy-test' => array(
        		'type' => 'Literal',
        		'options' => array(
        			'route' => '/dummy-test',
        			'defaults' => array(
        				'__NAMESPACE__' => 'DADummyTest\Controller',
        				'controller' => 'DummyIndex',
        				'action' => 'index'
        			)
        		)
        	)
        ),
    ),
    'controllers' => array(
        'factories' => [
            'DADummyTest\Controller\DummyIndex' => function (ControllerManager $cm) {
                $sm = $cm->getServiceLocator();
                $em = $sm->get('Doctrine\ORM\EntityManager');

                $controller = new Controller\DummyIndexController($em);

                return $controller;
            },
        ],
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
    'data-fixture' => array(
        __NAMESPACE__ . '_fixture' => __DIR__ . '/../src/' . __NAMESPACE__ . '/Fixture',
    ),
];