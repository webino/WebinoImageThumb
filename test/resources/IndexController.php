<?php
/**
 * Webino (http://webino.sk/)
 *
 * @link        https://github.com/webino/WebinoDraw/ for the canonical source repository
 * @copyright   Copyright (c) 2013 Webino, s. r. o. (http://webino.sk/)
 * @license     New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;

/**
 * WebinoImageThumb test application controller
 */
class IndexController extends AbstractActionController
{

    /**
     * Use case examples
     *
     * @return array
     */
    public function indexAction()
    {
        $thumbnailer = $this->getServiceLocator()->get('WebinoImageThumb');
        $image       = __DIR__ . '/test.jpg';

        $thumb = $thumbnailer->create(
            $image,
            array(), 
            array($thumbnailer->createReflection(40, 40, 80, true, '#a4a4a4'))
        );

        $thumb
            ->resize(200, 200)
            ->show()
            ->save('public/resized_test.jpg');
    }
}
