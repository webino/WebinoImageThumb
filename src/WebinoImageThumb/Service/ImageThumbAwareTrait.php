<?php
/**
 * Webino (https://github.com/webino/)
 *
 * @link      https://github.com/webino/WebinoImageThumb/ for the canonical source repository
 * @copyright Copyright (c) 2016 Webino, s. r. o. (http://webino.sk/)
 * @license   BSD-3-Clause
 */

namespace WebinoImageThumb\Service;

/**
 * Class ImageThumbAwareTrait
 *
 * Use this trait to inject ImageThumb service.
 *
 * @author ceadreak (github.com)
 */
trait ImageThumbAwareTrait
{
    /**
     * @var ImageThumb
     */
    protected $thumbnailer;

    /**
     * @return ImageThumb|null
     */
    public function getThumbnailer()
    {
        return $this->thumbnailer;
    }

    /**
     * @param ImageThumb $thumbnailer
     * @return $this
     */
    public function setThumbnailer(ImageThumb $thumbnailer)
    {
        $this->thumbnailer = $thumbnailer;
        return $this;
    }
}
