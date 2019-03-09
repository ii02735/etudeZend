<?php
/**
 * Created by IntelliJ IDEA.
 * User: yadallee
 * Date: 09/03/19
 * Time: 01:23
 */
namespace Personnes;

use Zend\ModuleManager\Feature\ConfigProviderInterface;

class Module implements ConfigProviderInterface
{
    const VERSION = '3.0.3-dev';

    public function getConfig()
    {
        // TODO: Implement getAutoloaderConfig() method.
        return include __DIR__."/../config/module.config.php";
    }
}