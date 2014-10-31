<?php
/**
 * Webino (https://github.com/webino/)
 *
 * @link      https://github.com/webino/WebinoImageThumb/ for the canonical source repository
 * @copyright Copyright (c) 2012-2014 Webino, s. r. o. (http://webino.sk/)
 * @license   BSD-3-Clause
 */

namespace WebinoImageThumb;

use PHPWebDriver_WebDriver;
use RuntimeException;

abstract class AbstractBase extends \PHPUnit_Framework_TestCase
{
    /**
     * Selenium Web Driver Host URI
     */
    const WEB_DRIVER_HOST = 'http://localhost:4444/wd/hub';

    /**
     * @var string
     */
    protected $uri;

    /**
     * @var PHPWebDriver_WebDriver
     */
    protected $webDriver;

    /**
     * @var PHPWebDriver_WebDriverSession
     */
    protected $session;

    /**
     *
     */
    public function setUp()
    {
        $this->uri       = $this->resolveUri();
        $this->webDriver = new PHPWebDriver_WebDriver(self::WEB_DRIVER_HOST);
        $this->session   = $this->webDriver->session('htmlunit');
    }

    /**
     *
     */
    public function tearDown()
    {
        $this->session->close();
    }

    /**
     * Resolve test target URI
     *
     * @return string
     */
    public function resolveUri()
    {
        $uri = getenv('URI');
        if (empty($uri)) {
            throw new RuntimeException('Expected URI env');
        }

        return $uri;
    }

    /**
     * Assert that response is a JPEG image
     *
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
