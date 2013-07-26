#!/usr/bin/env php
<?php

use Zend\Code\Scanner\FileScanner as CodeFileScanner;
use Zend\Di\Definition\CompilerDefinition;

// Autoloader
$vendorDirname = __DIR__ . '/../._test/ZendSkeletonApplication/vendor';
$loader = require $vendorDirname . '/autoload.php';

$loader->add('WebinoImageThumb', __DIR__ . '/../src');

// Compile Di Definition
$diCompiler = new CompilerDefinition;

$diCompiler->addDirectory(__DIR__ . '/../src');

foreach (array(

    // add files
//    $vendorDirname . '/zendframework/zendframework/library/Zend/.php',

) as $file) {
    $diCompiler->addCodeScannerFile(new CodeFileScanner($file));
}

$diCompiler->compile();

$definition = $diCompiler->toArrayDefinition()->toArray();

$dir = __DIR__ . '/../data/di';

is_dir($dir) or mkdir($dir);

file_put_contents(
    $dir . '/definition.php',
    '<?php ' . PHP_EOL . 'return ' . var_export($definition, true) . ';' . PHP_EOL
);