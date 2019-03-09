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
            "type" => Literal::class,
            "personnes" => [
                "controller" => "FirstController",
                "action" => "index",
            ],
        ],
    ]
];