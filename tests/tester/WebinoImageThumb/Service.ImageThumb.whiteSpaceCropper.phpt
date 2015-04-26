<?php
/**
 * Webino (http://webino.sk/)
 *
 * @link        https://github.com/webino/WebinoImageThumb/ for the canonical source repository
 * @copyright   Copyright (c) 2013-2015 Webino, s. r. o. (http://webino.sk/)
 * @license     BSD-3-Clause
 */

use Tester\Assert;
use WebinoImageThumb\PHPThumb\Plugin\WhiteSpaceCropper;
use WebinoImageThumb\Service\ImageThumb;

require __DIR__ . '/../bootstrap.php';


$thumbnailer = new ImageThumb;
$plugin = $thumbnailer->createWhiteSpaceCropper();


Assert::type(WhiteSpaceCropper::class, $plugin);
