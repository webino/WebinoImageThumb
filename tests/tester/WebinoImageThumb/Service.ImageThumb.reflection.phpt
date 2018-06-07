<?php
/**
 * Webino (http://webino.sk/)
 *
 * @link        https://github.com/webino/WebinoImageThumb/ for the canonical source repository
 * @copyright   Copyright (c) 2013-2018 Webino, s. r. o. (http://webino.sk/)
 * @license     BSD-3-Clause
 */

use PHPThumb\Plugins\Reflection;
use Tester\Assert;
use WebinoImageThumb\Service\ImageThumb;

require __DIR__ . '/../bootstrap.php';


$thumbnailer = new ImageThumb;
$plugin = $thumbnailer->createReflection(50, 50, 50, true, '#505050');


Assert::type(Reflection::class, $plugin);
