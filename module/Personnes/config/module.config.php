<?php
namespace Personnes;

use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;
use Personnes\Controller\MonController;
use Doctrine\ORM\Mapping\Driver\AnnotationDriver;
use Doctrine\Common\Persistence\Mapping\Driver\MappingDriverChain;
return [
    //Permet la génération des schémas (tables) en entités -> exécution des lignes de commandes :
    /*
     * ./vendor/bin/doctrine-module orm:convert-mapping --namespace=__NAMESPACE_."\\Model\\Entity\\" --force  --from-database annotation ./module/
     * ./vendor/bin/doctrine-module orm:generate-entities ./module/ --generate-annotations = true     
     */
    "doctrine" => [
        "driver" => [
            "orm_default" => [
                "class" => MappingDriverChain::class,
                "drivers" => [
                    __NAMESPACE__."\Entity\\" => "my_entity",
                ]
            ],
            "my_entity" => [
                "class" => AnnotationDriver::class,
                "cache" => "array",
                "paths" => __DIR__."/../Personnes/src/Entity",
            ],
        ],

    ],
    
    "controllers" => [
        "factories" => [
            Controller\MonController::class => Controller\MonControllerFactory::class,
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