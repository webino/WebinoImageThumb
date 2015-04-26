<?php
/**
 * Webino (http://webino.sk/)
 *
 * @link        https://github.com/webino/WebinoImageThumb/ for the canonical source repository
 * @copyright   Copyright (c) 2013-2015 Webino, s. r. o. (http://webino.sk/)
 * @license     BSD-3-Clause
 */

use Tester\Assert;
use WebinoImageThumb\Exception\RuntimeException;
use WebinoImageThumb\Service\ImageThumb;

require __DIR__ . '/../bootstrap.php';


$thumbnailer = new ImageThumb;
$src = __DIR__ . '/../../resources/data/media/this_should_not_exist.jpg';


Assert::exception(function() use ($thumbnailer, $src) {
    $thumbnailer->create($src);
}, RuntimeException::class);
