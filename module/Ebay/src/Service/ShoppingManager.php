<?php
/*
 * Copyright (C) 2016
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */
namespace Ebay\Service;

use \Exception;
use \InvalidArgumentException;
use \DTS\eBaySDK\Constants;
use \DTS\eBaySDK\Shopping\Services;

class ShoppingManager
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


    // Constructor method is used to inject dependencies to the controller.
    public function __construct($entityManager,  $configManager)
    {
        $this->entityManager = $entityManager;
        $this->configManager = $configManager;

    }

    public function getService(){

        $config = $this->configManager->getConfig();

        $service = new Services\ShoppingService([
            'credentials' => $config['credentials'],
            'siteId'      => Constants\SiteIds::US,
            'sandbox'     => $config['sandbox'],
            'apiVersion' =>  $config['shoppingApiVersion'],
        ]);

        return $service;
    }

}