<?php

namespace Personnes;
use Zend\Router\Http\Literal;

return [
    
    "controllers" => [
        "invokables" => [
            Controller\MonController::class,
        ],
    ],
    
    "router" => [
        "routes" => [
            "premiere" => [
                "type" => Literal::class,
                "options" => [
                    "route" => "/monUrl",
                    "defaults" => [
                    "controller" => Controller\MonController::class,
                    "action" => "index",
                    ],
                ],
            ],
            
        ],
    ],
];