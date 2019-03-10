<?php
use Doctrine\Common\Persistence\Mapping\Driver\MappingDriverChain;
use Doctrine\DBAL\Driver\PDOMySql\Driver;
use Doctrine\ORM\Mapping\Driver\AnnotationDriver;

/**
 * Global Configuration Override
 *
 * You can use this file for overriding configuration values from modules, etc.
 * You would place values in here that are agnostic to the environment and not
 * sensitive to security.
 *
 * @NOTE: In practice, this file will typically be INCLUDED in your source
 * control, so do not include passwords or other sensitive information in this
 * file.
 */

return [
    'doctrine' => [
        "connection" => [
            "orm_default" => [
                "driverClass" => Driver::class,
                "params" => [
                    "host" => "127.0.0.1",
                    "user" => "root",
                    "password" => "root",
                    "dbname" => "test",
                    
                ]
            ]
        ],
        "migrations_configuration" => [
            "orm_default" => [
                "name" => "ORM Default Migration",
                "directory" => __DIR__."/../../data/Migrations/",
                "namespace" => __NAMESPACE__.   "\\Migrations",
                "table_name" => "doctrine_migrations",
            ]
        ],
        "driver" => [            
            "orm_default" => [
            "class" => MappingDriverChain::class,
            "drivers" => [
               "Personnes\\Entity\\" => "my_entity",
            ]
        ],
            "my_entity" => [
                "class" => AnnotationDriver::class,
                "cache" => "array",
                "paths" => __DIR__."/../../module/Personnes/Entity",
            ],
        ],
    ],
    
];
