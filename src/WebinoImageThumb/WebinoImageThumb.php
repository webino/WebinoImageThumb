<?php
/**
 * Webino (https://github.com/webino/)
 *
 * @link      https://github.com/webino/WebinoImageThumb/ for the canonical source repository
 * @copyright Copyright (c) 2012-2014 Webino, s. r. o. (http://webino.sk/)
 * @license   New BSD License
 */

namespace WebinoImageThumb;

use PHPThumb\Plugins;
use PHPThumb\GD as PHPThumb;
use WebinoImageThumb\PhpThumb\Plugin as ExtraPlugins;

/**
 * WebinoImageThumb service
 *
 * Image thumbnailer powered by PHPThumb (https://github.com/masterexploder/PHPThumb)
 *
 * @author Peter Bačinský <peter@bacinsky.sk>
 */
class WebinoImageThumb
{
    /**
     * Create image thumbnail object
     *
     * @param  string $filename
     * @param  array $options
     * @param  array $plugins
     * @return PHPThumb
     */
    public function create($filename = null, array $options = array(), array $plugins = array())
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
     * @param int $border
     * @param int $color
     * @return ExtraPlugins\WhitespaceCropper
     */
    public function createWhitespaceCropper($border = 0, $color = 0)
    {
        return new ExtraPlugins\WhitespaceCropper($border, $color);
    }
    
    /**
     * Create a beautifull sharpen image
     * 
     * @param int $offset
     * @param Array $matrix
     * @return ExtraPlugins\Sharpen
     */
    public function createSharpen($offset = 0, $matrix = array()){
        return new ExtraPlugins\Sharpen($offset, $matrix);
    }
}
