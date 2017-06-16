<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

/**
 * List of enabled modules for this application.
 *
 * This should be an array of module namespaces used in the application.
 */
return [
    'Zend\Db',
    'Zend\Log',
    'Zend\Mail',
    'Zend\Mvc\Console',
    'Zend\Mvc\I18n',
    'Zend\Mvc\Plugin\FilePrg',
    'Zend\Mvc\Plugin\Identity',
    'Zend\Mvc\Plugin\Prg',
    'Zend\Navigation',
    'Zend\Serializer',
    'Zend\ServiceManager\Di',
    'Zend\Mvc\Plugin\FlashMessenger',
    'Zend\Session',
    'Zend\I18n',
    'Zend\Cache',
    'Zend\Form',
    'Zend\InputFilter',
    'Zend\Filter',
    'Zend\Router',
    'Zend\Validator',
    'DoctrineModule',
    'DoctrineORMModule',
    'ZendDeveloperTools',
    'Application',
    'SanSessionToolbar', // put at the end of modules list!
];
