<?php

require_once '../vendor/autoload.php';

$srcDir     = __DIR__.'/../vendor/alphayax/freebox_api_php/freebox/api/v3/services';
$namespace  = 'alphayax\freebox\api\v3\services';

$gen = new \alphayax\mdGen\MdGen( $srcDir, $namespace);
$gen->filterSubClasses( \alphayax\freebox\api\v3\Service::class);
/*
$gen->addChapter( 'alphayax\freebox\api\v3\services\AirMedia');
$gen->addChapter( 'alphayax\freebox\api\v3\services\Call');
$gen->addChapter( 'alphayax\freebox\api\v3\services\config');
*/
$gen->generate();

/*
$gen = new \alphayax\mdGen\MdGen( __DIR__.'/../vendor/alphayax/freebox_api_php/freebox/api/v3/models');
$gen->filterSubClasses( \alphayax\freebox\api\v3\Model::class);
$gen->addChapter( 'alphayax\freebox\api\v3\models\AirMedia');
$gen->addChapter( 'alphayax\freebox\api\v3\models\Call');
$gen->generate();
*/
