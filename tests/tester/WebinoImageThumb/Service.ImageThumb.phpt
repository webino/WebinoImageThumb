<?php
/**
 * Webino (http://webino.sk/)
 *
 * @link        https://github.com/webino/WebinoImageThumb/ for the canonical source repository
 * @copyright   Copyright (c) 2013-2015 Webino, s. r. o. (http://webino.sk/)
 * @license     BSD-3-Clause
 */

use PHPThumb\GD;
use Tester\Assert;
use WebinoImageThumb\Service\ImageThumb;

require __DIR__ . '/../bootstrap.php';


$thumbnailer = new ImageThumb;
$src = __DIR__ . '/../../resources/data/media/test.jpg';
$thumb = $thumbnailer->create($src);


Assert::type(GD::class, $thumb);
