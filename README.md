# Image Thumbnailer for Zend Framework 2

  [![Build Status](https://secure.travis-ci.org/webino/WebinoImageThumb.png?branch=master)](http://travis-ci.org/webino/WebinoImageThumb "Master")
  [![Build Status](https://secure.travis-ci.org/webino/WebinoImageThumb.png?branch=develop)](http://travis-ci.org/webino/WebinoImageThumb "Develop")

  Service that provides API to manipulate images.

  Powered by [PHPThumb](https://github.com/masterexploder/PHPThumb)

## Features

  - Resize, crop, pad, rotate, show and save images
  - Create image reflection

## Setup

  Following steps are necessary to get this module working, considering a zf2-skeleton or very similar application:

  1. Run: `php composer.phar require webino/webino-image-thumb:2.*`
  3. Add `WebinoImageThumb` to the enabled modules list

## Requirements

  - GD 2.0+

## QuickStart

  - For example add following code into the controller action, assume example image:

        // We encourage to use Dependency Injection instead of Service Locator
        $thumbnailer = $this->getServiceLocator()->get('WebinoImageThumb');
        $imagePath   = 'public/images/example.jpg';
        $thumb       = $thumbnailer->create($imagePath, $options = array(), $plugins = array());

        $thumb->resize(100, 100);

        $thumb->show();
        // or/and
        $thumb->save('public/images/resized.jpg');

    *NOTE: If you don't know how to inject the WebinoImageThumb into action controller, check out `test/resources`.*

  - Use reflection plugin:

        $reflection = $thumbnailer->createReflection(40, 40, 80, true, '#a4a4a4');
        $thumb      = $thumbnailer->create($imagePath, array(), array($reflection));

## Options

 The options array allows you to customize the behavior of the library a bit. Some of these options are implementation-specific, and are noted as such.  So, let's first go over what options are available to us:

<table>
    <tr>
        <th>Option Name</th>
        <th>Description</th>
        <th>Default Value</th>
        <th>Valid Values</th>
    </tr>
    <tr>
        <td>resizeUp</td>
        <td>Whether or not to scale an image up to the desired dimensions</td>
        <td>false</td>
        <td>true / false</td>
    </tr>
    <tr>
        <td>jpegQuality</td>
        <td>What quality to save jpeg files with (how much compression to use, 100 being none)</td>
        <td>100</td>
        <td>1-100</td>
    </tr>
    <tr>
        <td>correctPermissions</td>
        <td>Whether or not the library should attempt to correct file permissions. This will only work if you set up your PHP to allow chmod operations</td>
        <td>false</td>
        <td>true / false</td>
    </tr>
    <tr>
        <td>preserveAlpha</td>
        <td>Whether or not to preserve alpha transparency in PNG files</td>
        <td>true</td>
        <td>true / false</td>
    </tr>
    <tr>
        <td>alphaMaskColor</td>
        <td>What rgb color should be used for the alpha mask</td>
        <td><code>array(255,255,255)</code></td>
        <td><code>array([0-255], [0-255], [0-255])</code></td>
    </tr>
    <tr>
        <td>preserveTransparency</td>
        <td>Whether or not to preserve transparency in GIF files</td>
        <td>true</td>
        <td>true / false</td>
    </tr>
    <tr>
        <td>transparencyMaskColor</td>
        <td>What rgb color should be used for the transparency mask</td>
        <td><code>array(255,255,255)</code></td>
        <td><code>array([0-255], [0-255], [0-255])</code></td>
    </tr>
    <tr>
        <td>interlace</td>
        <td>When the interlace option equals true or false call imageinterlace</td>
        <td><code>null</code></td>
        <td><code>true / false</code></td>
    </tr>
</table>

## Functions

  * `adaptiveResize($width, $height)`
  * `adaptiveResizePercent($width, $height, $percent = 50)`
  * `adaptiveResizeQuadrant($width, $height, $quadrant = 'T|B|C|L|R')`
  * `crop($startX, $startY, $cropWidth, $cropHeight)`
  * `cropFromCenter($cropWidth, $cropHeight = null)`
  * `pad($width, $height, $color = array(255, 255, 255))`
  * `resize($maxWidth, $maxHeight)`
  * `resizePercent($percent)`
  * `rotateImage($direction = 'CW|CCW')`
  * `rotateImageNDegrees($degrees)`
  * `save($fileName, $format = 'GIF|JPG|PNG')`
  * `show($rawData = false)`

## Getters / Setters

  * `getCurrentDimensions()`
  * `getFileName()`
  * `getFormat()`
  * `getIsRemoteImage()`
  * `getMaxHeight()`
  * `getMaxWidth()`
  * `getNewDimensions()`
  * `getOldImage()`
  * `getOptions()`
  * `getPercent()`
  * `getWorkingImage()`
  * `setCurrentDimensions($currentDimensions)`
  * `setFileName($fileName)`
  * `setFormat($format)`
  * `setMaxHeight($maxHeight)`
  * `setMaxWidth($maxWidth)`
  * `setNewDimensions($newDimensions)`
  * `setOldImage($oldImage)`
  * `setOptions($options)`
  * `setPercent($percent)`
  * `setWorkingImage($workingImage)`

## Reflection plugin

  * `createReflection($percent, $reflection, $white, $border, $borderColor)`

    * `$percent` - What percentage of the image to create the reflection from.
    * `$reflection` - What percentage of the image height should the reflection height be.
    * `$white` - How transparent (using white as the background) the reflection should be, as a percent.
    * `$border` - Whether a border should be drawn around the original image.
    * `$borderColor` - The hex value of the color you would like your border to be.

## Changelog

### 2.0.0

  - Requires PHPThumb 2.0 via composer

### 1.0.0

  - Initial release

## Develop

### Requirements

  - [Linux](http://www.ubuntu.com/download)
  - [NetBeans](https://netbeans.org/downloads/) (optional)
  - [Phing](http://www.phing.info/trac/wiki/Users/Download)
  - [PHPUnit](http://phpunit.de/manual/3.7/en/installation.html)
  - [PSR-2 coding style](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md)
  - [Web browser](https://www.google.com/intl/sk/chrome/browser/) (recommended)
  - [Selenium](http://www.seleniumhq.org/) (optional)

### Setup

  1. Clone this repository and run: `phing update`

     *Now your development environment is set.*

  2. Open project in (NetBeans) IDE

  3. To check module integration with the skeleton application open following directory via web browser:

  `._test/ZendSkeletonApplication/public/`

     e.g. [http://localhost/WebinoImageThumb/._test/ZendSkeletonApplication/public/](http://localhost/WebinoImageThumb/._test/ZendSkeletonApplication/public/)

  4. Integration test resources are in directory: `test/resources`

### Testing

  - Run `phpunit` in the test directory
  - Run `phing test` in the module directory to run tests and code analysis

    *NOTE: To run the code analysis there are some tool requirements:*
      - [apigen](http://apigen.org/##installation)
      - [pdepend](http://pdepend.org/)
      - [phpcb](https://github.com/Mayflower/PHP_CodeBrowser)
      - [phpcpd](https://github.com/sebastianbergmann/phpcpd)
      - [phpcs](http://pear.php.net/package/PHP_CodeSniffer/)
      - [phploc](https://github.com/sebastianbergmann/phploc)
      - [phpmd](http://phpmd.org/download/index.html)

   *NOTE: Those tools are present after development environment is based.*

## Addendum

  Most of the documentation is taken from the [PHPThumb wiki](https://github.com/masterexploder/PHPThumb/wiki).

  Please, if you are interested in this Zend Framework module report any issues and don't hesitate to contribute.

[Report a bug](https://github.com/webino/WebinoImageThumb/issues) | [Fork me](https://github.com/webino/WebinoImageThumb)

