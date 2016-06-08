<?php
/**
 * Webino (http://webino.sk/)
 *
 * @link        https://github.com/webino/WebinoImageThumb/ for the canonical source repository
 * @copyright   Copyright (c) 2016 Webino, s. r. o. (http://webino.sk/)
 * @license     BSD-3-Clause
 */

use Tester\Assert;
use WebinoImageThumb\Service;

require __DIR__ . '/../bootstrap.php';


class ImageThumbAwareService implements Service\ImageThumbAwareInterface
{
    use Service\ImageThumbAwareTrait;
}


$service = new ImageThumbAwareService;
$thumbnailer = new Service\ImageThumb;


Assert::null($service->getThumbnailer());
Assert::same($service, $service->setThumbnailer($thumbnailer));
Assert::same($thumbnailer, $service->getThumbnailer());
