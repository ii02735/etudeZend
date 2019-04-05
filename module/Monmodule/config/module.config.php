<?php
namespace Monmodule;

use Monmodule\Factory\MonmoduleFactory;
use Zend\View\Model\JsonModel;
return [
    'controllers' => [
        'factories' => [
            Controller\MonmoduleController::class => MonmoduleFactory::class
        ]
    ],
    'router' => [
        'routes' => [
            'monmodule' => [
                'type' => 'Segment',
                'options' => [
                    // Change this to something specific to your module
                    'route' => '/module-specific-root',
                    'defaults' => [
                        'controller' => Controller\MonmoduleController::class,
                        'action' => 'index'
                    ]
                ]
            ],
            'commentaire' => [
                'type' => 'Literal',
                'options' => [
                    // Change this to something specific to your module
                    'route' => '/commentPost',
                    'defaults' => [
                        'controller' => Controller\MonmoduleController::class,
                        'action' => 'addcomment'
                    ],
                ],
            ],
            'like' => [
                'type' => 'Literal',
                'options' => [
                    // Change this to something specific to your module
                    'route' => '/like',
                    'defaults' => [
                        'controller' => Controller\MonmoduleController::class,
                        'action' => 'addlike'
                    ],
                ],
            ],
        ]
    ],
    'view_manager' => [
        'template_map' => [
            'Monmodule' => __DIR__ . '/../view/index.phtml'
        ],
        "strategies" => 'ViewJsonStrategy'
    ]
];
