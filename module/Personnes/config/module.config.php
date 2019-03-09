<?php
/**
 * Created by IntelliJ IDEA.
 * User: yadallee
 * Date: 09/03/19
 * Time: 01:28
 */

namespace Personnes;

use Zend\Router\Http\Literal;

return [
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
                    "controller" => "FirstController",
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
            ]
        ],
    ],

    'view_manager' => [
        'template_map' => [
            "MyTemplate" => __DIR__."/../view/MyTemplate.php"
        ],
    ],
];