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
 * Sharpen plugin
 *
 * @author Miguel Vieira <vieira@miguelvieira.com.pt>
 */
class Sharpen implements \PHPThumb\PluginInterface
{
    /**
     * @var int
     */
    protected $offset = 0;

    /**
     * @var array
     */
    protected $matrix = array(
        array(0.0, -1.0, 0.0),
        array(-1.0, 5.0, -1.0),
        array(0.0, -1.0, 0.0)
    );

    /**
     * @param type $offset Color offset
     * @param type $matrix A 3x3 matrix: an array of three arrays of three floats
     */
    public function __construct($offset = 0, $matrix = array())
    {
        empty($offset) or $this->offset = $offset;
        empty($matrix) or $this->matrix = $matrix;
    }

    /**
     * @param PHPThumb $phpthumb
     * @return PHPThumb
     */
    public function execute($phpthumb)
    {
        $divisor = array_sum(array_map('array_sum', $this->matrix));
        imageconvolution($phpthumb->getOldImage(), $this->matrix, $divisor, $this->offset);
        return $phpthumb;
    }
}
