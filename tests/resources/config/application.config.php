<?php
/**
 * Webino (https://github.com/webino/)
 *
 * @link      https://github.com/webino/WebinoImageThumb/ for the canonical source repository
 * @copyright Copyright (c) 2013-2015 Webino, s. r. o. (http://webino.sk/)
 * @license   BSD-3-Clause
 */

/**
 * WebinoImageThumb application test config
 */
return [
    'modules' => [
        'WebinoDev',
        'WebinoDebug',
        'WebinoImageThumb',
        'Application',
    ],
    'module_listener_options' => [
        'config_glob_paths' => [
            'config/autoload/{,*.}{global,local}.php',
        ],
        'config_static_paths' => [
            __DIR__ . '/module.config.php',
        ],
        'module_paths' => [
            './module',
            './vendor',
        ],
    ],
];
