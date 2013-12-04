<?php
/**
 * Webino (https://github.com/webino/)
 *
 * @link      https://github.com/webino/WebinoImageThumb/ for the canonical source repository
 * @copyright Copyright (c) 2013 Webino, s. r. o. (http://webino.sk/)
 * @license   New BSD License
 */

namespace WebinoImageThumb\Test;

use RuntimeException;

chdir(__DIR__);

$loader = @include __DIR__ . '/../vendor/autoload.php';
if (empty($loader)) {
    throw new RuntimeException('Unable to load. Run `php composer.phar install`.');
}

$loader->add('WebinoImageThumb', __DIR__ . '/../src');
