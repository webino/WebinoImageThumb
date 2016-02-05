<?php
/**
 * Webino (https://github.com/webino/)
 *
 * @link      https://github.com/webino/WebinoImageThumb/ for the canonical source repository
 * @copyright Copyright (c) 2013-2016 Webino, s. r. o. (http://webino.sk/)
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
     * @var float
     */
    protected $scale = .5;

    /**
     * @param PHPThumb $watermarkThumb
     * @param array $position
     * @param float $scale
     */
    public function __construct(PHPThumb $watermarkThumb, $position = [0, 0], $scale = .5)
    {
        $this->watermarkThumb = $watermarkThumb;
        $this->position = $position;
        $this->scale = $scale;
    }


    /**
     * @param PHPThumb $phpthumb
     * @return PHPThumb
     */
    public function execute($phpthumb)
    {
        $currentDimensions = $phpthumb->getCurrentDimensions();

        $width    = $currentDimensions['width'];
        $height   = $currentDimensions['height'];
        $oldImage = $phpthumb->getOldImage();

        $this->watermarkThumb->resize($width * $this->scale, $height * $this->scale);

        $watermarkImage = $this->watermarkThumb->getOldImage();
        $watermarkCurrentDimensions = $this->watermarkThumb->getCurrentDimensions();

        $watermarkWidth  = $watermarkCurrentDimensions['width'];
        $watermarkHeight = $watermarkCurrentDimensions['height'];

        switch ($this->position[0]) {
            case -1:
                $positionX = 0;
                break;
            case 1:
                $positionX = $width - $watermarkWidth;
                break;
            default:
                $positionX = $width / 2 - $watermarkWidth / 2;
        }

        switch ($this->position[1]) {
            case -1:
                $positionY = $height - $watermarkHeight;
                break;
            case 1:
                $positionY = 0;
                break;
            default:
                $positionY = $height / 2 - $watermarkHeight / 2;
        }

        imagealphablending($oldImage, true);
        imagecopy($oldImage, $watermarkImage, $positionX, $positionY, 0, 0, $watermarkWidth, $watermarkHeight);

        return $phpthumb;
    }
}
