<?php
/**
 * Webino (https://github.com/webino/)
 *
 * @link        https://github.com/webino/WebinoImageThumb/ for the canonical source repository
 * @copyright   Copyright (c) 2012 Peter Bačinský <peter@bacinsky.sk>
 * @license     New BSD License
 * @package     WebinoImageThumb
 */

namespace WebinoImageThumb;

use WebinoImageThumb\Exception;

/**
 * Image thumbnailer powered by PHPThumb
 *
 * @category    Webino
 * @package     WebinoImageThumb
 */
class Module
{
    /**
     * Default autoloader config
     *
     * @return array
     */
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php',
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    /**
     * Create WebinoImageThumb service
     *
     * @return array
     */
    public function getServiceConfig()
    {
        $module = $this;

        return array(
            'factories' => array(
                'WebinoImageThumb' => function () use ($module) {
                    return $module;
                },
            ),
        );
    }

    /**
     * Create image thumbnail object
     *
     * @param  string $filename
     * @param  array $options
     * @param  bool $isDataStream
     * @return type
     */
    public function create($filename = null, $options = array(), $isDataStream = false)
    {
        try {
            $thumb = \PhpThumbFactory::create($filename, $options, $isDataStream);
        } catch (\Exception $e) {
            throw new Exception\RuntimeException($e->getMessage(), $e->getCode(), $e);
        }
        return $thumb;
    }
}
