<?php
/**
 * Webino (https://github.com/webino/)
 *
 * @link      https://github.com/webino/WebinoImageThumb/ for the canonical source repository
 * @copyright Copyright (c) 2013 Webino, s. r. o. (http://webino.sk/)
 * @license   New BSD License
 */

/**
 * WebinoImageThumb application test config
 *
 * @author Peter Bačinský <peter@bacinsky.sk>
 */
return array(
    'modules' => array(
        'WebinoImageThumb',
        'Application',
    ),
    'module_listener_options' => array(
        'config_glob_paths' => array(
            'config/autoload/{,*.}{global,local}.php',
        ),
        'config_static_paths'    => array(
            __DIR__ . '/module.config.php',
        ),
        'module_paths' => array(
            'WebinoImageThumb' => __DIR__ . '/../..',
            './module',
            './vendor',
        ),
    ),
);
