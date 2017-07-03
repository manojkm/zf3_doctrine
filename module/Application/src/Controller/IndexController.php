<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Application\Entity\Post;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

use \DTS\eBaySDK\Constants;
use \DTS\eBaySDK\Trading\Services;
use \DTS\eBaySDK\Trading\Types;
use \DTS\eBaySDK\Trading\Enums;



class IndexController extends AbstractActionController
{

    /**
     * Entity manager.
     * @var Doctrine\ORM\EntityManager
     */
    private $entityManager;

    /**
     * Post manager.
     * @var Application\Service\PostManager
     */
    private $postManager;

    /**
     * @var array
     */
    private $configManager;


    // Constructor method is used to inject dependencies to the controller.
    public function __construct($entityManager, $postManager, $configManager)
    {
        $this->entityManager = $entityManager;
        $this->postManager = $postManager;
        $this->configManager = $configManager;

    }

    // This is the default "index" action of the controller. It displays the
    // Posts page containing the recent blog posts.
    public function indexAction()
    {
        $config = $this->configManager->getConfig();

        // Get recent posts
        $posts = $this->entityManager->getRepository(Post::class)
            ->findBy(['status'=>Post::STATUS_PUBLISHED],
                ['dateCreated'=>'DESC']);

        // Get popular tags.
        $tagCloud = $this->postManager->getTagCloud();


//        // Create the service object.
//        $service = new Services\ShoppingService([
//            'apiVersion'  => '1.13.0',
//            'globalId'    => 'EBAY-US',
//            'credentials' =>  $this->config['sandbox']['credentials'],
//
//        ]);
//
//        // Create the request object.
//        $request = new Types\GeteBayTimeRequestType();
//
//        // Send the request to the service operation.
//        $response = $service->geteBayTime($request);

        /**
         * Create the service object.
         */
        $service = new Services\TradingService([
            'credentials' => $config['credentials'],
            'siteId'      => Constants\SiteIds::US,
            'sandbox'     => $config['sandbox'],
        ]);
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
        $severityCodeType = new Enums\SeverityCodeType;


        // Render the view template
        return new ViewModel([
            'posts' => $posts,
            'postManager' => $this->postManager,
            'tagCloud' => $tagCloud,
            'response' => $response,
            'severityCodeType' => $severityCodeType,

        ]);
    }

}