<?php
/**
 * Created by IntelliJ IDEA.
 * User: yadallee
 * Date: 09/03/19
 * Time: 01:28
 */

namespace Personnes;

use Doctrine\ORM\Mapping\Driver\AnnotationDriver;
use Zend\Router\Http\Literal;

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
              "paths" => [__DIR__."/../src/Entity"]
            ],
            'orm_default' => [
                "drivers" => [
                    "Entity" => __NAMESPACE__."_driver"
                ]
            ]
        ]
    ],

    'controllers'=>[
      'invokables'=>[
          "FirstController" => Controller\MyController::class,
      ],
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
                        "controller" => "FirstController",
                        "action" => "template",
                    ],
                ],
            ],
        ],
    ],

    'view_manager' => [
        'template_map' => [
            "MyTemplate" => __DIR__."/../view/MyTemplate.php",
            "Other" => __DIR__."/../view/OtherTemplate.phtml",
        ],
    ],
];