<?php
namespace App\Action;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class HomeActionFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $em = $container->get("doctrine.entity_manager.orm_default");
        return new HelloAction($em);
    }
    
}

