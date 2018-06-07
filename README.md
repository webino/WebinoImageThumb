# Image Thumbnailer <br /> for Zend Framework 2

[![Build Status](https://secure.travis-ci.org/webino/WebinoImageThumb.png?branch=develop)](http://travis-ci.org/webino/WebinoImageThumb "Develop Build Status")
[![Coverage Status](https://coveralls.io/repos/webino/WebinoImageThumb/badge.png?branch=develop)](https://coveralls.io/r/webino/WebinoImageThumb?branch=develop "Develop Coverage Status")
[![Scrutinizer Quality Score](https://scrutinizer-ci.com/g/webino/WebinoImageThumb/badges/quality-score.png?b=develop)](https://scrutinizer-ci.com/g/webino/WebinoImageThumb/?branch=develop "Quality Score")
[![Dependency Status](https://www.versioneye.com/user/projects/529f9724632bac57310000b6/badge.png)](https://www.versioneye.com/user/projects/529f9724632bac57310000b6 "Develop Dependency Status")
<br />
[![Latest Stable Version](https://poser.pugx.org/webino/webino-image-thumb/v/stable.png)](https://packagist.org/packages/webino/webino-image-thumb "Latest Stable Version")
[![Total Downloads](https://poser.pugx.org/webino/webino-image-thumb/downloads.png)](https://packagist.org/packages/webino/webino-image-thumb "Total Downloads")
[![Latest Unstable Version](https://poser.pugx.org/webino/webino-image-thumb/v/unstable.png)](https://packagist.org/packages/webino/webino-image-thumb "Latest Unstable Version")
[![License](https://poser.pugx.org/webino/webino-image-thumb/license.svg)](https://packagist.org/packages/webino/webino-image-thumb)

Service that provides API to manipulate images.

- Powered by [PHPThumb](https://github.com/masterexploder/PHPThumb)
- Demo [webino-image-thumb.demo.webino.org](http://webino-image-thumb.demo.webino.org/)
  - [Reflection](http://webino-image-thumb.demo.webino.org/application/demo/reflection)
  - [Whitespace cropper](http://webino-image-thumb.demo.webino.org/application/demo/whitespace-cropper)
  - [Sharpen](http://webino-image-thumb.demo.webino.org/application/demo/sharpen)
  - [Watermark](http://webino-image-thumb.demo.webino.org/application/demo/watermark)

## Features

  - Resize, crop, pad, rotate, show and save images
  - Create image reflection
  - Crop whitespace
  - Sharpen images
  - Watermark

## Setup

  Following steps are necessary to get this module working, considering a zf2-skeleton or very similar application:

  1. Run: `php composer.phar require webino/webino-image-thumb:dev-develop`
  3. Add `WebinoImageThumb` to the enabled modules list

## Requirements

  - PHP >= 5.6
  - GD 2.0+

## QuickStart

  - For example add following code into the controller action, assume example image:

        // We encourage to use Dependency Injection instead of Service Locator
        $thumbnailer = $this->getServiceLocator()->get('WebinoImageThumb');
        $imagePath   = 'public/images/example.jpg';
        $thumb       = $thumbnailer->create($imagePath, $options = [], $plugins = []);

        $thumb->resize(100, 100);

        $thumb->show();
        // or/and
        $thumb->save('public/images/resized.jpg');

    *NOTE: If you don't know how to inject the WebinoImageThumb into action controller, check out `test/resources`*

  - Use reflection plugin:

        $reflection = $thumbnailer->createReflection(40, 40, 80, true, '#a4a4a4');
        $thumb      = $thumbnailer->create($imagePath, [], [$reflection]);

  - Use whitespace cropper plugin:

        $cropper = $thumbnailer->createWhitespaceCropper();
        $thumb   = $thumbnailer->create($imagePath, [], [$cropper]);

  - Use sharpen plugin:

        $sharpen = $thumbnailer->createSharpen();
        $thumb   = $thumbnailer->create($imagePath, [], [$sharpen]);

  - Use watermark plugin:

        $watermarkPath  = 'public/images/my_watermark.png';
        $watermarkThumb = $thumbnailer->create($watermarkPath);
        $watermark      = $thumbnailer->createWatermark($watermarkThumb);
        $thumb          = $thumbnailer->create($imagePath, [], [$watermark]);

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
        <td><code>[255, 255, 255]</code></td>
        <td><code>[0-255, 0-255, 0-255]</code></td>
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
        <td><code>[255, 255, 255]</code></td>
        <td><code>[0-255, 0-255, 0-255]</code></td>
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
  * `pad($width, $height, $color = [255, 255, 255])`
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

## Whitespace Cropper plugin

  * `createWhitespaceCropper($border, $color)`

    * `$margin` - What pixels of a margin should be around the original image.
    * `$color`  - The hex value of the color you would like to crop.

## Watermark plugin

  * `createWatermark(PHPThumb $watermarkThumb, $position = [0, 0], $scale = .5)`

    * `$watermarkThumb` - Watermark image from watermark file.
    * `$position`  - Position of watermark, center by default:
        * `[0, 0]`   - center
        * `[-1, -1]` - left bottom
        * `[-1, 1]`  - left top
        * `[1, 1]`   - right top
        * `[1, -1]`  - right bottom
    * `$scale` - Scale of the watermark relative to the image.


## Changelog

### 2.1.0 [UNRELEASED]

  - Requires webino/thumbnailer replacing masterexploder/PHPThumb
  - Deprecated plugin classes, moved to webino/thumbnailer package

### 2.0.0

  - PHP >= 5.6
  - Requires PHPThumb 2.0 via composer
  - Added Whitespace Cropper plugin
  - Added Sharpen plugin
  - Removed ZF autoloader support
  - Added Watermark plugin
  - Added ImageThumbAwareInterface & Trait

### 1.0.0

  - Initial release

## Development

[![Dependency Status](https://www.versioneye.com/user/projects/52f494f2ec1375dc7b0000cd/badge.svg?style=flat)](https://www.versioneye.com/user/projects/52f494f2ec1375dc7b0000cd)

We will appreciate any contributions on development of this module.

Learn [How to develop Webino modules](https://github.com/webino/Webino/wiki/How-to-develop-Webino-module)

## Addendum

  Most of the documentation is taken from the [PHPThumb wiki](https://github.com/masterexploder/PHPThumb/wiki).

  Please, if you are interested in this Zend Framework module report any issues and don't hesitate to contribute.

[Report a bug](https://github.com/webino/WebinoImageThumb/issues) | [Fork me](https://github.com/webino/WebinoImageThumb)
