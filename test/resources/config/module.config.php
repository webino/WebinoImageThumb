<?php
/**
 * Webino (https://github.com/webino/)
 *
 * @link      https://github.com/webino/WebinoImageThumb/ for the canonical source repository
 * @copyright Copyright (c) 2012-2014 Webino, s. r. o. (http://webino.sk/)
 * @license   New BSD License
 */

/**
 * WebinoImageThumb example config
 *
 * To encouraging better practices we provide
 * an example of controller Dependency Injection
 * over the Service Locator resolution.
 */
return array(
    'service_manager' => array(
        'factories' => array(
            'Zend\I18n\Translator\TranslatorInterface' => 'Zend\I18n\Translator\TranslatorServiceFactory',
        ),
    ),
    'router' => array(
        'routes' => array(
            'home' => array(
                'options' => array(
                    'defaults' => array(
                        /**
                         * We want to use the DI, so override the application
                         * module config with a controller FQCN, instead of invocable alias
                         */
                        'controller' => 'Application\Controller\IndexController',
                    ),
                ),
            ),
        ),
    ),
    'di' => array(
        /**
         * For security reasons we must allow
         * our controller for the DI
         */
        'allowed_controllers' => array(
            'Application\Controller\IndexController',
        ),
        'instance' => array(
            /**
             * Configure the controller
             * to inject WebinoImageThumb service
             */
            'Application\Controller\IndexController' => array(
                'parameters' => array(
                    'thumbnailer' => 'WebinoImageThumb',
                ),
            ),
        ),
    ),
);
