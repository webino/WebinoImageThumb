<?php 
return array (
  'WebinoImageThumb\\Exception\\ExceptionInterface' => 
  array (
    'supertypes' => 
    array (
    ),
    'instantiator' => NULL,
    'methods' => 
    array (
    ),
    'parameters' => 
    array (
    ),
  ),
  'WebinoImageThumb\\Exception\\RuntimeException' => 
  array (
    'supertypes' => 
    array (
      0 => 'WebinoImageThumb\\Exception\\ExceptionInterface',
      1 => 'RuntimeException',
      2 => 'Exception',
    ),
    'instantiator' => '__construct',
    'methods' => 
    array (
      '__construct' => 3,
    ),
    'parameters' => 
    array (
      '__construct' => 
      array (
        'WebinoImageThumb\\Exception\\RuntimeException::__construct:0' => 
        array (
          0 => 'message',
          1 => NULL,
          2 => false,
          3 => NULL,
        ),
        'WebinoImageThumb\\Exception\\RuntimeException::__construct:1' => 
        array (
          0 => 'code',
          1 => NULL,
          2 => false,
          3 => NULL,
        ),
        'WebinoImageThumb\\Exception\\RuntimeException::__construct:2' => 
        array (
          0 => 'previous',
          1 => NULL,
          2 => false,
          3 => NULL,
        ),
      ),
    ),
  ),
  'WebinoImageThumb\\Module' => 
  array (
    'supertypes' => 
    array (
      0 => 'Zend\\ModuleManager\\Feature\\AutoloaderProviderInterface',
      1 => 'Zend\\ModuleManager\\Feature\\ConfigProviderInterface',
    ),
    'instantiator' => '__construct',
    'methods' => 
    array (
    ),
    'parameters' => 
    array (
    ),
  ),
  'WebinoImageThumb\\PhpThumb\\Plugin\\Sharpen' => 
  array (
    'supertypes' => 
    array (
      0 => 'PHPThumb\\PluginInterface',
    ),
    'instantiator' => '__construct',
    'methods' => 
    array (
      '__construct' => 3,
    ),
    'parameters' => 
    array (
      '__construct' => 
      array (
        'WebinoImageThumb\\PhpThumb\\Plugin\\Sharpen::__construct:0' => 
        array (
          0 => 'offset',
          1 => NULL,
          2 => false,
          3 => 0,
        ),
        'WebinoImageThumb\\PhpThumb\\Plugin\\Sharpen::__construct:1' => 
        array (
          0 => 'matrix',
          1 => NULL,
          2 => false,
          3 => 
          array (
          ),
        ),
      ),
    ),
  ),
  'WebinoImageThumb\\PhpThumb\\Plugin\\WhitespaceCropper' => 
  array (
    'supertypes' => 
    array (
      0 => 'PHPThumb\\PluginInterface',
    ),
    'instantiator' => '__construct',
    'methods' => 
    array (
      '__construct' => 3,
    ),
    'parameters' => 
    array (
      '__construct' => 
      array (
        'WebinoImageThumb\\PhpThumb\\Plugin\\WhitespaceCropper::__construct:0' => 
        array (
          0 => 'margin',
          1 => NULL,
          2 => false,
          3 => 0,
        ),
        'WebinoImageThumb\\PhpThumb\\Plugin\\WhitespaceCropper::__construct:1' => 
        array (
          0 => 'color',
          1 => NULL,
          2 => false,
          3 => NULL,
        ),
      ),
    ),
  ),
  'WebinoImageThumb\\WebinoImageThumb' => 
  array (
    'supertypes' => 
    array (
    ),
    'instantiator' => '__construct',
    'methods' => 
    array (
    ),
    'parameters' => 
    array (
    ),
  ),
);
