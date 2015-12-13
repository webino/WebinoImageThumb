<?php
/**
 * Webino (https://github.com/webino/)
 *
 * @link      https://github.com/webino/WebinoImageThumb/ for the canonical source repository
 * @copyright Copyright (c) 2013-2015 Webino, s. r. o. (http://webino.sk/)
 * @license   BSD-3-Clause
 */

namespace WebinoImageThumb\PhpThumb\Plugin;

use PHPThumb\GD as PHPThumb;

/**
 * Add watermark to image
 *
 * @author Peter Bubelíny <neri@neridev.com>
 */
class Watermark implements \PHPThumb\PluginInterface
{
    /**
     * @var PHPThumb $watermarkThumb
     */
    protected $watermarkThumb;

    /**
     * @var array $position
     */
    protected $position = [0, 0];

    /**
     * @param PHPThumb $watermarkThumb
     * @param array $position
     */
    public function __construct(PHPThumb $watermarkThumb, $position = [0, 0])
    {
        $this->watermarkThumb = $watermarkThumb;
        $this->position = $position;
    }


    /**
     * @param PHPThumb $phpthumb
     * @return PHPThumb
     */
    public function execute($phpthumb)
    {
        $currentDimensions = $phpthumb->getCurrentDimensions();
        $height            = $currentDimensions['height'];
        $oldImage          = $phpthumb->getOldImage();
        $watermarkImage    = $this->watermarkThumb->getOldImage();

        $watermarkCurrentDimensions = $this->watermarkThumb->getCurrentDimensions();
        $watermarkWidth             = $watermarkCurrentDimensions['width'];
        $watermarkHeight            = $watermarkCurrentDimensions['height'];
        $positionY                  = ($height - $watermarkHeight) - $this->position[1];

        imagecopy(
            $oldImage,
            $watermarkImage,
            $this->position[0],
            $positionY,
            0,
            0,
            $watermarkWidth,
            $watermarkHeight
        );

        return $phpthumb;
    }
}
