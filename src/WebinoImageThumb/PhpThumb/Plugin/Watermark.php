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
     * @var int
     */
    protected $watermarkThumb;

    /**
     * @var int
     */
    protected $position = [0, 0];

    /**
     * Watermark constructor
     * @param int $watermark
     * @param int $position
     */
    public function __construct($watermarkThumb, $position)
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
        $watermarkThumb    = $this->watermarkThumb->getOldImage();

        $watermarkCurrentDimensions = $this->watermarkThumb->getCurrentDimensions();
        $watermarkWidth             = $watermarkCurrentDimensions['width'];
        $watermarkHeight            = $watermarkCurrentDimensions['height'];

        $position[0] = $this->position[0];
        $position[1] = $this->position[1];
        $positionY   = ($height-$watermarkHeight)-$position[1];

        imagecopy(
            $oldImage,
            $watermarkThumb,
            $position[0],
            $positionY,
            0,
            0,
            $watermarkWidth,
            $watermarkHeight
        );

        $phpthumb->setWorkingImage($oldImage);

        return $phpthumb;
    }
}
