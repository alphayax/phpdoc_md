
# PHPDoc Md

A PHPDoc markdown documentation generator in PHP.

![stable](https://poser.pugx.org/alphayax/freebox_api_php/v/stable)
![unstable](https://poser.pugx.org/alphayax/freebox_api_php/v/unstable)
![pakagist](https://img.shields.io/packagist/v/alphayax/freebox_api_php.svg)

[![Build Status](https://travis-ci.org/alphayax/freebox_api_php.svg?branch=master)](https://travis-ci.org/alphayax/freebox_api_php)
[![Coverage](https://api.codacy.com/project/badge/Coverage/f3569cf671f04b8ab6d699be3fd011e5)](https://www.codacy.com/app/alphayax/freebox_api_php?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=alphayax/freebox_api_php&amp;utm_campaign=Badge_Coverage)
![codacy](https://api.codacy.com/project/badge/Grade/f3569cf671f04b8ab6d699be3fd011e5)

![license](https://img.shields.io/packagist/l/alphayax/freebox_api_php.svg)

## Installation

Use [composer](https://getcomposer.org/) ! 


## Usage

This example (from [example](example/)) will generate a markdown documentation for classes in the given namespace : 

```php
require_once '../vendor/autoload.php';

$srcDir     = __DIR__.'/../vendor/alphayax/freebox_api_php/freebox/api/v3/services';
$namespace  = 'alphayax\freebox\api\v3\services';

$gen = new \alphayax\mdGen\MdGen( $srcDir, $namespace);
$gen->filterSubClasses( \alphayax\freebox\api\v3\Service::class);
$gen->generate( 'services');
```

