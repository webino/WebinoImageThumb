<?php
/**
 * Webino (https://github.com/webino/)
 *
 * @link      https://github.com/webino/WebinoImageThumb/ for the canonical source repository
 * @copyright Copyright (c) 2013-2015 Webino, s. r. o. (http://webino.sk/)
 * @license   New BSD License
 */

namespace WebinoImageThumb;

/**
 * Do not write your custom settings into this file
 */
return [
    // TODO deprecated DI config, remove
    'di' => [
        'definition' => [
            'compiler' => [
                __DIR__ . '/../data/di/definition.php',
            ],
        ],
        'instance' => [
            'alias' => [
               'WebinoImageThumb' => Service\ImageThumb::class,
           ],
        ],
    ],
    'service_manager' => [
        'invokables' => [
            'WebinoImageThumb' => Service\ImageThumb::class,
        ],
    ],
];
