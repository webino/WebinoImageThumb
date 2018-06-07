<?php

/**
 * Webino (https://github.com/webino/)
 *
 * @link      https://github.com/webino/WebinoImageThumb/ for the canonical source repository
 * @copyright Copyright (c) 2013-2018 Webino, s. r. o. (http://webino.sk/)
 * @license   BSD-3-Clause
 */

namespace WebinoImageThumb\Service;

use PHPThumb\Plugins;
use PHPThumb\GD as PHPThumb;
use WebinoImageThumb\Exception;

/**
 * Image Thumbnailer service
 *
 * Image thumbnailer powered by PHPThumb (https://github.com/masterexploder/PHPThumb)
 */
class ImageThumb
{
    /**
     * Create image thumbnail object
     *
     * @param string $filename
     * @param array $options
     * @param array $plugins
     * @return PHPThumb
     */
    public function create($filename = null, array $options = [], array $plugins = [])
    {
        try {
            $thumb = new PHPThumb($filename, $options, $plugins);
        } catch (\Exception $exc) {
            throw new Exception\RuntimeException($exc->getMessage(), $exc->getCode(), $exc);
        }

        return $thumb;
    }

    /**
     * Create reflection plugin
     *
     * @param int $percent
     * @param int $reflection
     * @param int $white
     * @param bool $border
     * @param string $borderColor hex
     * @return Plugins\Reflection
     */
    public function createReflection($percent, $reflection, $white, $border, $borderColor)
    {
        return new Plugins\Reflection($percent, $reflection, $white, $border, $borderColor);
    }

    /**
     * Create a plugin to crop the whitespace surrounding an image
     *
     * @param int $border
     * @param int $color
     * @return Plugins\WhitespaceCropper
     */
    public function createWhitespaceCropper($border = 0, $color = 0)
    {
        return new Plugins\WhitespaceCropper($border, $color);
    }

    /**
     * Create a beautifull sharpen image
     *
     * @param int $offset
     * @param array $matrix
     * @return Plugins\Sharpen
     */
    public function createSharpen($offset = 0, array $matrix = [])
    {
        return new Plugins\Sharpen($offset, $matrix);
    }

    /**
     * Create a watermark on image
     *
     * @param PHPThumb $watermarkThumb
     * @param array $position
     * @param float $scale
     * @return Plugins\Watermark
     */
    public function createWatermark(PHPThumb $watermarkThumb, array $position = [0, 0], $scale = .5)
    {
        return new Plugins\Watermark($watermarkThumb, $position, $scale);
    }
}
