<?php
namespace Personnes;

use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;
use Personnes\Controller\MonController;
return [

    "controllers" => [
        "invokables" => [
            Controller\MonController::class
        ]
    ],

    "router" => [
        "routes" => [
            "premiere" => [
                "type" => Literal::class,
                "options" => [
                    "route" => "/monUrl",
                    "defaults" => [
                        "controller" => MonController::class,
                        "action" => "index"
                    ]
                ]
            ],
            "seconde" => [
                "type" => Segment::class,
                "options" => [
                    "route" => "/second[:numero]",
                    "constraints" => [
                        "numero" => "[0-9]+"
                    ],
                    "defaults" => [
                        "controller" => MonController::class,
                        "action" => "seconde"
                    ]
                ]
            ],
            "troisiemeVue" => [
                "type" => Literal::class,
                "options" => [
                    "route" => "/testVue",
                    "defaults" => [
                        "controller" => MonController::class,
                        "action" => "vue"
                    ]
                ]
            ]
        ],
    ],
    "view_manager" => [
        "template_map" => [
            "view/Vue" => __DIR__ . "/../view/Vue.phtml",
        ],
        'template_path_stack' => [
            __DIR__ . '/../view'
        ]
    ]
];