<?php

namespace WebinoImageThumb\PhpThumb\Plugin;

use PHPThumb\GD as PHPThumb;

/**
 * Sharpen plugin
 *
 * @author Miguel Vieira <vieira@mihuelvieira.com.pt>
 */
class Sharpen implements \PHPThumb\PluginInterface
{
    protected $offset = 0;
    protected $matrix  = array(
        array(0.0, -1.0, 0.0),
        array(-1.0, 5.0, -1.0),
        array(0.0, -1.0, 0.0)
    );

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
        $oldImage = $phpthumb->getOldImage();

        $divisor = array_sum(array_map('array_sum', $this->matrix));

        imageconvolution($oldImage, $this->matrix, $divisor, $this->offset);

        return $phpthumb;
    }
}
