<?php
namespace Personnes;

use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;
use Personnes\Controller\MonController;
use Doctrine\ORM\Mapping\Driver\AnnotationDriver;
return [
    //Permet la génération des schémas (tables) en entités -> exécution des lignes de commandes :
    /*
     * ./vendor/bin/doctrine-module orm:convert-mapping --namespace="Entity\\" --force  --from-database annotation ./module/__NAMESPACE__/src
     * ./vendor/bin/doctrine-module orm:generate-entities ./module/__NAMESPACE__/src/ --generate-annotations = true
     */
    "doctrine" => [
        "driver" => [
            __NAMESPACE__.'_driver' => [
                "class" => AnnotationDriver::class,
                "cache" => "array",
                "paths" => [__DIR__."/../src/Model/Entity/"],
            ],
            'orm_default' => [
                "drivers" => [
                    "Model\\Entity\\" => __NAMESPACE__."_driver"
                ]
            ]
        ],
        "migrations_configuration" => [
            "orm_default" => [
                "name" => "ORM Default Migration",
                "directory" => __DIR__."/../src/Model/Migrations/",
                "namespace" => "Personnes\\Model\\Migrations",
                "table_name" => "doctrine_migrations",
            ]
        ]
    ],
    
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
            ],
            "orm" => [
                "type" => Literal::class,
                "options" => [
                    "route" => "/data",
                    "defaults" => [
                        "controller" => MonController::class,
                        "action" => "data"
                    ]
                ]
            ],
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