#!/usr/bin/env php
<?php
/**
 * Webino (http://webino.sk/)
 *
 * @link        https://github.com/webino/WebinoDev/ for the canonical source repository
 * @copyright   Copyright (c) 2013-2015 Webino, s. r. o. (http://webino.sk/)
 * @license     BSD-3-Clause
 */

namespace WebinoImageThumb;

use WebinoDev\Di\Definition\Generator;

require __DIR__ . '/../tests/resources/init_autoloader.php';
(new Generator(__DIR__))->compile()->dump();
(new Generator(__DIR__ . '/../tests/resources/src'))->compile()->dump();
