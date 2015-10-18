<?php
/**
 * Webino (https://github.com/webino/)
 *
 * @link      https://github.com/webino/WebinoImageThumb/ for the canonical source repository
 * @copyright Copyright (c) 2013-2015 Webino, s. r. o. (http://webino.sk/)
 * @license   New BSD License
 */

use WebinoImageThumb\Service\ImageThumb;

/**
 * Do not write your custom settings into this file
 */
return [
    // TODO deprecated DI config, use factories
    'di' => [
        'definition' => [
            'compiler' => [
                __DIR__ . '/../data/di/definition.php',
            ],
        ],
        'instance' => [
            'alias' => [
               'WebinoImageThumb' => ImageThumb::class,
           ],
        ],
    ],
];
