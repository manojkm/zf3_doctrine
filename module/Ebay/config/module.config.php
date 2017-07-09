<?php
namespace Ebay;

use Zend\ServiceManager\Factory\InvokableFactory;
use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;

return [
    'controllers' => [
        'factories' => [
            Controller\IndexController::class => Controller\Factory\IndexControllerFactory::class,
        ],
    ],
    'service_manager' => [
        'factories' => [
            Service\ConfigManager::class => InvokableFactory::class,
            Service\TradingManager::class =>  Service\Factory\TradingManagerFactory::class,
            Service\ShoppingManager::class =>  Service\Factory\ShoppingManagerFactory::class
        ],
    ],
    'router' => [
        'routes' => [
            'ebay' => [
                'type'    => Segment::class,
                'options' => [
                    // Change this to something specific to your module
                    'route'    => '/ebay[/:action]',
                    'defaults' => [
                        'controller'    => Controller\IndexController::class,
                        'action'        => 'index',
                    ],
                ],
                'may_terminate' => true,
                'child_routes' => [
                    // You can place additional routes that match under the
                    // route defined above here.
                ],
            ],

        ],
    ],
    'view_manager' => [
        'template_path_stack' => [
            'Ebay' => __DIR__ . '/../view',
        ],
    ],
];
