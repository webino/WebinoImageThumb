<?php

/**
 * Webino (https://github.com/webino/)
 *
 * @link      https://github.com/webino/WebinoImageThumb/ for the canonical source repository
 * @copyright Copyright (c) 2012-2014 Webino, s. r. o. (http://webino.sk/)
 * @license   BSD-3-Clause
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
     * Save and show an image with reflection
     */
    public function reflectionAction()
    {
        $image      = __DIR__ . '/test.jpg';
        $reflection = $this->thumbnailer->createReflection(40, 40, 80, true, '#a4a4a4');
        $thumb      = $this->thumbnailer->create($image, array(), array($reflection));

        $thumb
            ->resize(200, 200)
            ->show()
            ->save('public/resized_test.jpg');

        return false;
    }

    /**
     * Save and show an image with whitespace cropper
     */
    public function whitespaceCropperAction()
    {
        $image   = __DIR__ . '/test_whitespace.jpg';
        $cropper = $this->thumbnailer->createWhitespaceCropper(0, 0x000000);
        $thumb   = $this->thumbnailer->create($image, array(), array($cropper));

        $thumb
            ->resize(200, 200)
            ->show()
            ->save('public/resized_test.jpg');

        return false;
    }

    /**
     * Save and show an image with sharpen
     */
    public function sharpenAction()
    {
        $image   = __DIR__ . '/test.jpg';
        $sharpen = $this->thumbnailer->createSharpen();
        $thumb   = $this->thumbnailer->create($image, array(), array($sharpen));

        $thumb
            ->resize(200, 200)
            ->show()
            ->save('public/sharpen_test.jpg');

        return false;
    }
}
