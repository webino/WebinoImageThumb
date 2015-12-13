<?php
/**
 * Webino (https://github.com/webino/)
 *
 * @link      https://github.com/webino/WebinoImageThumb/ for the canonical source repository
 * @copyright Copyright (c) 2013-2015 Webino, s. r. o. (http://webino.sk/)
 * @license   BSD-3-Clause
 */

namespace Application\Controller;

use PHPThumb\PHPThumb;
use WebinoImageThumb\Service\ImageThumb;
use Zend\Mvc\Controller\AbstractActionController;

/**
 * Image Thumbnailer test application controller
 */
class DemoController extends AbstractActionController
{
    /**
     * @var ImageThumb
     */
    protected $thumbnailer;

    /**
     * Example of a constructor DI
     *
     * If you don't want to use DI, you can use a Service Locator
     * <code>
     *     $this->getServiceLocator()->get('WebinoImageThumb');
     * </code>
     *
     * To see how we configure the controller to use DI
     * check out tests/resources/config/module.config.php
     *
     * @param ImageThumb|object $thumbnailer
     */
    public function __construct(ImageThumb $thumbnailer)
    {
        $this->thumbnailer = $thumbnailer;
    }

    /**
     * Save and show an image with reflection
     */
    public function reflectionAction()
    {
        $image      = __DIR__ . '/../../../data/media/test.jpg';
        $reflection = $this->thumbnailer->createReflection(40, 40, 80, true, '#a4a4a4');
        $thumb      = $this->thumbnailer->create($image, [], [$reflection]);

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
        $image   = __DIR__ . '/../../../data/media/test_whitespace.jpg';
        $cropper = $this->thumbnailer->createWhitespaceCropper(0, 0x000000);
        $thumb   = $this->thumbnailer->create($image, [], [$cropper]);

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
        $image   = __DIR__ . '/../../../data/media/test.jpg';
        $sharpen = $this->thumbnailer->createSharpen();
        $thumb   = $this->thumbnailer->create($image, [], [$sharpen]);

        $thumb
            ->resize(200, 200)
            ->show()
            ->save('public/sharpen_test.jpg');

        return false;
    }

    /**
     * Save and show an image with watermark
     */
    public function watermarkAction()
    {
        $watermarkPath  = __DIR__ . '/../../../data/media/watermark.png';
        $image          = __DIR__ . '/../../../data/media/test.jpg';

        $watermarkThumb = $this->thumbnailer->create($watermarkPath);
        $watermarkThumb->resize(100, 100);

        $watermark = $this->thumbnailer->createWatermark($watermarkThumb, [30, 30]);
        $thumb     = $this->thumbnailer->create($image, [], [$watermark]);

        $thumb
            ->resize(200, 200)
            ->show()
            ->save('public/watermark_test.jpg');

        return false;
    }
}