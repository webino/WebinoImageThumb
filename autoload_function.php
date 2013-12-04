<?php
return function ($class) {
    static $map;
    if (!$map) $map = include __DIR__ . '/src/WebinoImageThumb/autoload_classmap.php';
    if (!isset($map[$class])) return false;

    return include $map[$class];
};
