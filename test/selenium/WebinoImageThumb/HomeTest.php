<?php
/**
 * Webino (https://github.com/webino/)
 *
 * @link      https://github.com/webino/WebinoImageThumb/ for the canonical source repository
 * @copyright Copyright (c) 2012-2014 Webino, s. r. o. (http://webino.sk/)
 * @license   BSD-3-Clause
 */

namespace WebinoImageThumb;

/**
 * WebinoImageThumb module tests
 */
class HomeTest extends AbstractBase
{
    /**
     * Reflection plugin test
     */
    public function testReflection()
    {
        $src = file_get_contents($this->uri . 'application/index-controller/reflection');
        $this->assertJpegImage($src);
    }

    /**
     * Sharpen plugin test
     */
    public function testSharpen()
    {
        $src = file_get_contents($this->uri . 'application/index-controller/sharpen');
        $this->assertJpegImage($src);
    }
}
