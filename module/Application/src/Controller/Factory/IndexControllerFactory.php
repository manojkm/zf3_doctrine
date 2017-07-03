<?php
namespace Application\Controller\Factory;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use Application\Service\PostManager;
use Application\Service\ConfigManager;
use Application\Controller\IndexController;


/**
 * This is the factory for IndexController. Its purpose is to instantiate the
 * controller.
 */
class IndexControllerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $entityManager = $container->get('doctrine.entitymanager.orm_default');
        $postManager = $container->get(PostManager::class);

        //Config sample : https://github.com/rearley/ebay/blob/master/src/Earley/Ebay/Common/Config.php
        $configManger = $container->get(ConfigManager::class);


        //Config tutorial : https://github.com/zf-fr/zfr-mailchimp-module
//        $config = $container->get('Config');
//        $ebayApi = $config['ebay_api'];
//
//        if (!isset($ebayApi)) {
//            throw new \Exception(
//                'No config was found for eBay Api. Did you copy the `ebay_api.local.php` file to your autoload folder?'
//            );
//        }

        // Instantiate the controller and inject dependencies
        return new IndexController($entityManager, $postManager,$configManger);
    }
}




