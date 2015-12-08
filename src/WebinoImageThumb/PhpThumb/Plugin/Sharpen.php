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
use PHPThumb\PluginInterface;

/**
 * Sharpen plugin
 *
 * @author Miguel Vieira <vieira@miguelvieira.com.pt>
 */
class Sharpen implements PluginInterface
{
    /**
     * @var int
     */
    protected $offset = 0;

    /**
     * @var array
     */
    protected $matrix = [
        [0.0, -1.0, 0.0],
        [-1.0, 5.0, -1.0],
        [0.0, -1.0, 0.0],
    ];

    /**
     * @param int $offset Color offset
     * @param int $matrix A 3x3 matrix: an array of three arrays of three floats
     */
    public function __construct($offset = 0, $matrix = [])
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
