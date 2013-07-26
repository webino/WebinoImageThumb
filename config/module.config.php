<?php

return array(
    'di' => array(
        'definition' => array(
            'compiler' => array(
                __DIR__ . '/../data/di/definition.php',
            ),
        ),
        'instance' => array(
            'alias' => array(
               'WebinoImageThumb' => 'WebinoImageThumb\WebinoImageThumb',
           ),
        ),
    ),
);
