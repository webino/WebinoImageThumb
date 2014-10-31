<?php
/**
 * Webino (https://github.com/webino/)
 *
 * @link      https://github.com/webino/WebinoImageThumb/ for the canonical source repository
 * @copyright Copyright (c) 2012-2014 Webino, s. r. o. (http://webino.sk/)
 * @license   BSD-3-Clause
 */

// Overrdides application controller
require __DIR__ . '/../IndexController.php';

/**
 * WebinoImageThumb application test config
 *
 * @author Peter Bačinský <peter@bacinsky.sk>
 */
return array(
    'modules' => array(

        'Application',
        'WebinoImageThumb',
    ),
    'module_listener_options' => array(
        'config_glob_paths' => array(
            'config/autoload/{,*.}{global,local}.php',
        ),
        'config_static_paths'    => array(
            __DIR__ . '/module.config.php',
        ),
        'module_paths' => array(
            'WebinoImageThumb' => __DIR__ . '/../..',
            'module',
            'vendor',
        ),
    ),
);
