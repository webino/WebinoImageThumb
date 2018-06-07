<?php
/**
 * Webino (http://webino.sk/)
 *
 * @link        https://github.com/webino/WebinoImageThumb/ for the canonical source repository
 * @copyright   Copyright (c) 2013-2015 Webino, s. r. o. (http://webino.sk/)
 * @license     BSD-3-Clause
 */

use Tester\Assert;
use WebinoImageThumb\Service\ImageThumb;
use Zend\Mvc\Application;
use Zend\ServiceManager\ServiceManager;

require __DIR__ . '/../bootstrap.php';


$app = createApp();
$services = $app->getServiceManager();
$imageThumb = $services->get('WebinoImageThumb');


Assert::type(Application::class, $app);
Assert::type(ServiceManager::class, $services);
Assert::type(ImageThumb::class, $imageThumb);
