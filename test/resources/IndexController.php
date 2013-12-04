<?php
/**
 * Webino (https://github.com/webino/)
 *
 * @link      https://github.com/webino/WebinoImageThumb/ for the canonical source repository
 * @copyright Copyright (c) 2013 Webino, s. r. o. (http://webino.sk/)
 * @license   New BSD License
 */

namespace Application\Controller;

use WebinoImageThumb\WebinoImageThumb;
use Zend\Mvc\Controller\AbstractActionController;

/**
 * WebinoImageThumb test application controller
 *
 * @author Peter Bačinský <peter@bacinsky.sk>
 */
class IndexController extends AbstractActionController
{
    /**
     * @var WebinoImageThumb
     */
    protected $thumbnailer;

    /**
     * Example of constructor DI
     *
     * If you don't want to use DI, you can use a Service Locator
     * <code>
     *     $this->getServiceLocator()->get('WebinoImageThumb');
     * </code>
     *
     * To see how we configure the controller to use DI
     * check out test/resources/config/module.config.php
     *
     * @param WebinoImageThumb $thumbnailer
     */
    public function __construct(WebinoImageThumb $thumbnailer)
    {
        $this->thumbnailer = $thumbnailer;
    }

    /**
     * How to example
     *
     * Save and show an image with reflection
     */
    public function indexAction()
    {
        $this->thumbnailer = $this->getServiceLocator()->get('WebinoImageThumb');
        $image = __DIR__ . '/test.jpg';

        $thumb = $this->thumbnailer->create(
            $image, array(), array($this->thumbnailer->createReflection(40, 40, 80, true, '#a4a4a4'))
        );

        $thumb
            ->resize(200, 200)
            ->show()
            ->save('public/resized_test.jpg');
    }
}
