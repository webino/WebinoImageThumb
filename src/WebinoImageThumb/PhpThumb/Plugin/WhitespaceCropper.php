<?php
/**
 * Webino (https://github.com/webino/)
 *
 * @link      https://github.com/webino/WebinoImageThumb/ for the canonical source repository
 * @copyright Copyright (c) 2012-2014 Webino, s. r. o. (http://webino.sk/)
 * @license   BSD-3-Clause
 */

namespace WebinoImageThumb\PhpThumb\Plugin;

use PHPThumb\GD as PHPThumb;

/**
 * Crop a whitespace around image
 *
 * @author Peter Bačinský <peter@bacinsky.sk>
 */
class WhitespaceCropper implements \PHPThumb\PluginInterface
{
    /**
     * @var int
     */
    protected $margin = 0;

    /**
     * @var int
     */
    protected $color = 0xFFFFFF;

    /**
     *
     * @param int $margin
     * @param int $color
     */
    public function __construct($margin = 0, $color = null)
    {
        empty($margin)  or $this->margin = $margin;
        is_null($color) or $this->color  = $color;
    }

    /**
     * @param PHPThumb $phpthumb
     * @return PHPThumb
     */
    public function execute($phpthumb)
    {
        $currentDimensions = $phpthumb->getCurrentDimensions();
        $oldImage          = $phpthumb->getOldImage();

        $borderTop = 0;
        for (; $borderTop < imagesy($oldImage); ++$borderTop) {
            for ($x = 0; $x < imagesx($oldImage); ++$x) {
                if (imagecolorat($oldImage, $x, $borderTop) !== $this->color) {
                    $borderTop -= $this->margin;
                    break 2;
                }
            }
        }

        $borderBottom = 0;
        for (; $borderBottom < imagesy($oldImage); ++$borderBottom) {
            for ($x = 0; $x < imagesx($oldImage); ++$x) {
                if (imagecolorat($oldImage, $x, imagesy($oldImage) - $borderBottom - 1) != $this->color) {
                    $borderBottom -= $this->margin;
                    break 2;
                }
            }
        }

        $borderLeft = 0;
        for (; $borderLeft < imagesx($oldImage); ++$borderLeft) {
            for ($y = 0; $y < imagesy($oldImage); ++$y) {
                if (imagecolorat($oldImage, $borderLeft, $y) !== $this->color) {
                    $borderLeft -= $this->margin;
                    break 2;
                }
            }
        }

        $borderRight = 0;
        for (; $borderRight < imagesx($oldImage); ++$borderRight) {
            for ($y = 0; $y < imagesy($oldImage); ++$y) {
                if (imagecolorat($oldImage, imagesx($oldImage) - $borderRight - 1, $y) !== $this->color) {
                    $borderRight -= $this->margin;
                    break 2;
                }
            }
        }

        $width        = imagesx($oldImage) - ($borderLeft + $borderRight);
        $height       = imagesy($oldImage) - ($borderTop + $borderBottom);
        $workingImage = imagecreatetruecolor($width, $height);

        imagecopy(
            $workingImage,
            $oldImage,
            0,
            0,
            $borderLeft,
            $borderTop,
            $width,
            $height
        );

        $phpthumb->setOldImage($workingImage);
        $currentDimensions['width']  = $width;
        $currentDimensions['height'] = $height;
        $phpthumb->setCurrentDimensions($currentDimensions);

        return $phpthumb;
    }
}
