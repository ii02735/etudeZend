<?php
/**
 * Created by IntelliJ IDEA.
 * User: yadallee
 * Date: 09/03/19
 * Time: 01:28
 */

namespace Personnes;

use Doctrine\ORM\Mapping\Driver\AnnotationDriver;
use Zend\Mvc\Service\ViewJsonStrategyFactory;
use Zend\Router\Http\Literal;
use Zend\View\Strategy\JsonStrategy;

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
                    __NAMESPACE__."\Model\Entity" => __NAMESPACE__."_driver"
                ]
            ]
        ]
    ],

    'controllers'=>[
      'invokables'=>[
          Controller\MyController::class,
      ],
        "factories" => [
            Controller\ApiController::class => Controller\ApiControllerFactory::class
        ]

    ],

    'router' => [
        "routes" => [
            "personnes" => [
                "type" => Literal::class,
                "options" => [
                    "route" => "/personne",
                    "defaults"=>[
                    "controller" => Controller\MyController::class,
                    "action" => "index",
                    ],
                ],
            ],
            "template" => [
                "type" => Literal::class,
                "options" => [
                    "route" => "/MyTemplate",
                    "defaults"=>[
                        "controller" => Controller\MyController::class,
                        "action" => "template",
                    ],
                ],
            ],
            "data" => [
                "type" => Literal::class,
                "options" => [
                    "route" => "/Data",
                    "defaults"=>[
                        "controller" => Controller\ApiController::class,
                        "action" => "data",
                    ],
                ],
            ],
        ],
    ],

    'view_manager' => [
        'template_map' => [
            "MyTemplate" => __DIR__ . "/../view/MyTemplate.phtml",
            "Other" => __DIR__."/../view/OtherTemplate.phtml",
            "OK" => __DIR__."/../view/OKTemplate.phtml",
            "Data" => __DIR__."/../view/DataTemplate.phtml",
        ],
        "strategies" => ["ViewJsonStrategy"],
    ],
];