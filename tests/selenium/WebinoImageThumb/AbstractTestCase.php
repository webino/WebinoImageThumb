<?php
/**
 * Webino (https://github.com/webino/)
 *
 * @link      https://github.com/webino/WebinoImageThumb/ for the canonical source repository
 * @copyright Copyright (c) 2013-2015 Webino, s. r. o. (http://webino.sk/)
 * @license   BSD-3-Clause
 */

namespace WebinoImageThumb;

use WebinoDev\Test\Selenium\AbstractTestCase as BaseAbstractTestCase;

/**
 * Class AbstractTestCase
 */
abstract class AbstractTestCase extends BaseAbstractTestCase
{
    /**
     * Assert that response is a JPEG image
     *
     * @param string $source
     * @return self
     */
    protected function assertJpegImage($source)
    {
        $this->assertNotContains('Error', $source);
        $this->assertNotContains('Exception', $source);
        $this->assertContains('<CREATOR: gd-jpeg', $source);
        return $this;
    }
}
