<?php
namespace Monmodule\Factory;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use Monmodule\Controller\MonmoduleController;

class MonmoduleFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $em = $container->get("doctrine.entitymanager.orm_default");
        return new MonmoduleController($em);
    }

}

