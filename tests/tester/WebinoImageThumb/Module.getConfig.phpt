<?php
/**
 * Webino (http://webino.sk/)
 *
 * @link        https://github.com/webino/WebinoImageThumb/ for the canonical source repository
 * @copyright   Copyright (c) 2013-2015 Webino, s. r. o. (http://webino.sk/)
 * @license     BSD-3-Clause
 */

use Tester\Assert;
use WebinoImageThumb\Module;

require __DIR__ . '/../bootstrap.php';


$module = new Module;
$config = $module->getConfig();


Assert::true(is_array($config));
