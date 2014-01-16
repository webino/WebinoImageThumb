<?php
/**
 * Webino (https://github.com/webino/)
 *
 * @link      https://github.com/webino/WebinoImageThumb/ for the canonical source repository
 * @copyright Copyright (c) 2012-2014 Webino, s. r. o. (http://webino.sk/)
 * @license   New BSD License
 */

namespace WebinoImageThumb;

class HomeTest extends AbstractBase
{
    /**
     *
     */
    public function testHome()
    {
        $this->session->open($this->uri);

        $src = $this->session->source();
        $this->assertNotContains('Error', $src, null, true);
        $this->assertNotContains('Exception', $src, null, true);
        $this->assertContains('<CREATOR: gd-jpeg', $src);
    }
}
