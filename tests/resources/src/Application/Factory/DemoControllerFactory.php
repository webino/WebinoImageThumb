<?php
/**
 * Webino (https://github.com/webino/)
 *
 * @link      https://github.com/webino/WebinoImageThumb/ for the canonical source repository
 * @copyright Copyright (c) 2015 Webino, s. r. o. (http://webino.sk/)
 * @license   BSD-3-Clause
 */

namespace Application\Factory;

use Application\Controller\DemoController;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class DemoControllerFactory
 */
class DemoControllerFactory implements FactoryInterface
{
    /**
     * @param ServiceLocatorInterface|\Zend\Mvc\Controller\ControllerManager $controllers
     * @return DemoController
     */
    public function createService(ServiceLocatorInterface $controllers)
    {
        $services = $controllers->getServiceLocator();
        return new DemoController($services->get('WebinoImageThumb'));
    }
}
