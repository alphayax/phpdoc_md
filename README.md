
# PHPDoc Md

A PHPDoc markdown documentation generator in PHP.

![stable](https://poser.pugx.org/alphayax/phpdoc_md/v/stable)
![unstable](https://poser.pugx.org/alphayax/phpdoc_md/v/unstable)
![pakagist](https://img.shields.io/packagist/v/alphayax/phpdoc_md.svg)

[![Build Status](https://travis-ci.org/alphayax/phpdoc_md.svg?branch=master)](https://travis-ci.org/alphayax/phpdoc_md)
[![Coverage](https://api.codacy.com/project/badge/Coverage/92d84b7d5f284c248937099ffc7afa5a)](https://www.codacy.com/app/alphayax/phpdoc_md?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=alphayax/phpdoc_md&amp;utm_campaign=Badge_Coverage)
[![Codacy Badge](https://api.codacy.com/project/badge/Grade/92d84b7d5f284c248937099ffc7afa5a)](https://www.codacy.com/app/alphayax/phpdoc_md?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=alphayax/phpdoc_md&amp;utm_campaign=Badge_Grade)

[![License](https://poser.pugx.org/alphayax/phpdoc_md/license)](https://packagist.org/packages/alphayax/phpdoc_md)
[![Total Downloads](https://poser.pugx.org/alphayax/phpdoc_md/downloads)](https://packagist.org/packages/alphayax/phpdoc_md)

## Installation

Use [composer](https://getcomposer.org/) ! 

```
composer require alphayax/phpdoc_md
```


## Usage

This example (from [example](example/)) will generate a markdown documentation for classes in the given namespace : 

```php
require_once '../vendor/autoload.php';

$srcDir     = __DIR__.'/../src';
$namespace  = 'alphayax\mdGen';

$gen = new \alphayax\mdGen\MdGen( $srcDir, $namespace);
$gen->generate( 'md_gen');
```

## Documentation 

The documentation is auto-generated with this sources :)

- [models](docs/models/__NAMESPACE__.md)
    - [NamespaceMd](docs/models/__NAMESPACE__.md#NamespaceMd)
    - [ClassMd](docs/models/__NAMESPACE__.md#ClassMd)
    - [MethodMd](docs/models/__NAMESPACE__.md#MethodMd)
- [utils](docs/utils/__NAMESPACE__.md)
    - [arrayAccessProperties](docs/utils/__NAMESPACE__.md#arrayAccessProperties)
- [MdGen](docs/__NAMESPACE__.md#MdGen)


