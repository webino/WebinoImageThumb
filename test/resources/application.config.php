<?php
return array(
    'modules' => array(
        'WebinoImageThumb',
        'Application',
    ),
    'module_listener_options' => array(
        'config_glob_paths'    => array(
            'config/autoload/{,*.}{global,local}.php',
        ),
        'config_static_paths'    => array(

        ),
        'module_paths' => array(
            'WebinoImageThumb' => __DIR__ . '/../..',
            './module',
            './vendor',
        ),
    ),
);
