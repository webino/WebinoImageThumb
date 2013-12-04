<?php
/**
 * Webino (https://github.com/webino/)
 *
 * @link      https://github.com/webino/WebinoImageThumb/ for the canonical source repository
 * @copyright Copyright (c) 2013 Webino, s. r. o. (http://webino.sk/)
 * @license   New BSD License
 */

namespace WebinoImageThumb;

use PHPThumb\Plugins;
use PHPThumb\GD as PHPThumb;

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
     * @return Plugins\ReflectionPlugin
     */
    public function createReflection($percent, $reflection, $white, $border, $borderColor)
    {
        return new Plugins\Reflection($percent, $reflection, $white, $border, $borderColor);
    }
}
