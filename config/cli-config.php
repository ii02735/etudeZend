<?php

use Doctrine\DBAL\Tools\Console\Helper\ConnectionHelper;
use Doctrine\Migrations\Configuration\Configuration;
use Doctrine\Migrations\Tools\Console\Helper\ConfigurationHelper;
use Doctrine\ORM\EntityManager;

$container = require 'config/container.php';
$em = $container->get(EntityManager::class);
$migrationsConfiguration = $container->get("config")["doctrine"]["migrations_configuration"]["orm_default"];

$configuration = new Configuration($em->getConnection());
$configuration->setMigrationsDirectory($migrationsConfiguration["directory"]);
$configuration->setName($migrationsConfiguration["name"]);
$configuration->setMigrationsNamespace($migrationsConfiguration["namespace"]);


return new \Symfony\Component\Console\Helper\HelperSet([
    'em' => new \Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper($em),
    "db" => new ConnectionHelper($em->getConnection()),
    "configuration" => new ConfigurationHelper($em->getConnection(),$configuration),
]);
