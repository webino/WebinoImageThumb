<?php
/**
 * Webino (https://github.com/webino/)
 *
 * @link      https://github.com/webino/WebinoImageThumb/ for the canonical source repository
 * @copyright Copyright (c) 2013-2015 Webino, s. r. o. (http://webino.sk/)
 * @license   BSD-3-Clause
 */

use Application\Controller\IndexController;
use Zend\I18n\Translator\TranslatorInterface;
use Zend\I18n\Translator\TranslatorServiceFactory;

/**
 * WebinoImageThumb example config
 *
 * To encouraging better practices we provide
 * an example of controller Dependency Injection
 * over the Service Locator resolution.
 */
return [
    'service_manager' => [
        'aliases' => [
            'Application\Controller\Index' => IndexController::class,
        ],
        'factories' => [
            TranslatorInterface::class => TranslatorServiceFactory::class,
        ],
    ],
    'router' => [
        'routes' => [
            'home' => [
                'options' => [
                    'defaults' => [
                        /**
                         * We want to use the DI, so override the application
                         * module config with a controller FQCN, instead of invocable alias
                         */
                        'controller' => IndexController::class,
                    ],
                ],
            ],
        ],
    ],
    'di' => [
        /**
         * For security reasons we must allow
         * our controller for the DI
         */
        'allowed_controllers' => [
            IndexController::class,
        ],
        'instance' => [
            /**
             * Configure the controller
             * to inject WebinoImageThumb service
             */
            IndexController::class => [
                'parameters' => [
                    'thumbnailer' => 'WebinoImageThumb',
                ],
            ],
        ],
    ],
    'webino_debug' => [
        // Development mode
        'mode' => false,
        'bar'  => true,
    ],
];
