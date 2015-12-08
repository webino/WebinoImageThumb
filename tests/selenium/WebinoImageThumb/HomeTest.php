<?php
/**
 * Webino (https://github.com/webino/)
 *
 * @link      https://github.com/webino/WebinoImageThumb/ for the canonical source repository
 * @copyright Copyright (c) 2013-2015 Webino, s. r. o. (http://webino.sk/)
 * @license   BSD-3-Clause
 */

namespace WebinoImageThumb;

/**
 * WebinoImageThumb module tests
 */
class HomeTest extends AbstractTestCase
{
    /**
     * Reflection plugin test
     */
    public function testReflection()
    {
        $src = file_get_contents($this->uri . 'application/demo/reflection');
        $this->assertJpegImage($src);
    }

    /**
     * Whitespace cropper plugin test
     */
    public function testWhitespaceCropper()
    {
        $src = file_get_contents($this->uri . 'application/demo/whitespace-cropper');
        $this->assertJpegImage($src);
    }

    /**
     * Sharpen plugin test
     */
    public function testSharpen()
    {
        $src = file_get_contents($this->uri . 'application/demo/sharpen');
        $this->assertJpegImage($src);
    }
}
