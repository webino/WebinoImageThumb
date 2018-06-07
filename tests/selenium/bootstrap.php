<?php
/**
 * Webino (http://webino.sk/)
 *
 * @link        https://github.com/webino/WebinoImageThumb/ for the canonical source repository
 * @copyright   Copyright (c) 2013-2015 Webino, s. r. o. (http://webino.sk/)
 * @license     BSD-3-Clause
 */

namespace WebinoImageThumb\Test;

use Zend\Mvc\Application;

// Change directory to our testing application
chdir(__DIR__ . '/../../._test/ZendSkeletonApplication');

/**
 * Initialize test resources autoloader
 */
require __DIR__ . '/../resources/init_autoloader.php';

/**
 * Application factory
 */
function createApp() {
    return Application::init(require 'config/application.config.php');
}
