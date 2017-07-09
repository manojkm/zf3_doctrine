<?php
namespace Ebay\Service\Factory;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use Ebay\Service\ConfigManager;
use Ebay\Service\ShoppingManager;

/**
 * This is the factory for PostManager. Its purpose is to instantiate the
 * service.
 */
class ShoppingManagerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $entityManager = $container->get('doctrine.entitymanager.orm_default');
        $configManger = $container->get(ConfigManager::class);

        // Instantiate the service and inject dependencies
        return new ShoppingManager($entityManager, $configManger);
    }
}




