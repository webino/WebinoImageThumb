<?php
/**
 * Webino (https://github.com/webino/)
 *
 * @link      https://github.com/webino/WebinoImageThumb/ for the canonical source repository
 * @copyright Copyright (c) 2013-2015 Webino, s. r. o. (http://webino.sk/)
 * @license   BSD-3-Clause
 */

namespace Application;

use Application\Controller;
use Application\Factory;
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
        'factories' => [
            TranslatorInterface::class => TranslatorServiceFactory::class,
        ],
    ],
    'controllers' => [
        'factories' => [
            'Application\Controller\Demo' => Factory\DemoControllerFactory::class,
        ],
    ],
    'webino_debug' => [
        // Development mode
        'mode' => false,
        'bar'  => true,
    ],
];
