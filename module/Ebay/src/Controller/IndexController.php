<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonModule for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Ebay\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

use \DTS\eBaySDK\Constants;
use \DTS\eBaySDK\Trading\Services;
use \DTS\eBaySDK\Trading\Types;
use \DTS\eBaySDK\Trading\Enums;
use \DTS\eBaySDK\Shopping\Enums as ShoppingEnums;
use \DTS\eBaySDK\Shopping\Types as ShoppingTypes;

class IndexController extends AbstractActionController
{
    /**
     * Entity manager.
     * @var Doctrine\ORM\EntityManager
     */
    private $entityManager;

    /**
     * @var array
     */
    private $configManager;

    private $tradingManager;

    private $shoppingManager;


    // Constructor method is used to inject dependencies to the controller.
    public function __construct($entityManager, $configManager, $tradingManager, $shoppingManager)
    {
        $this->entityManager = $entityManager;
        $this->configManager = $configManager;
        $this->tradingManager = $tradingManager;
        $this->shoppingManager = $shoppingManager;


    }

    public function indexAction()
    {

        $config = $this->configManager->getConfig();
        /**
         * Create the service object.
         */
        $service = $this->tradingManager->getService();

        /**
         * Create the request object.
         */
        $request = new Types\GeteBayOfficialTimeRequestType();

        /**
         * An user token is required when using the Trading service.
         */
        $request->RequesterCredentials = new Types\CustomSecurityHeaderType();
        $request->RequesterCredentials->eBayAuthToken = $config['authToken'];

        /**
         * Send the request.
         */
        $response = $service->geteBayOfficialTime($request);

        // Render the view template
        return new ViewModel([
            'response' => $response,
            'severityCodeType' => new Enums\SeverityCodeType,
        ]);

    }


    public function addAction(){

        /**
         * Create the service object.
         */
        $service = $this->shoppingManager->getService();

        /**
         * Create the request object.
         */
        $request = new ShoppingTypes\GetCategoryInfoRequestType();
        $request->CategoryID = '-1';
        $request->IncludeSelector = 'ChildCategories';

        /**
         * Send the request.
         */
        $response = $service->getCategoryInfo($request);

        return new ViewModel([
            'response' => $response,
            'severityCodeType' => new ShoppingEnums\SeverityCodeType,
        ]);
    }
}
