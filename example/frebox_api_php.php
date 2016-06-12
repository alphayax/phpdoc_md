<?php

require_once '../vendor/autoload.php';

$srcDir     = __DIR__.'/../vendor/alphayax/freebox_api_php/freebox/api/v3/services';
$namespace  = 'alphayax\freebox\api\v3\services';

$gen = new \alphayax\mdGen\MdGen( $srcDir, $namespace);
$gen->filterSubClasses( \alphayax\freebox\api\v3\Service::class);
$gen->generate( 'services');
