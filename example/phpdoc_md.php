<?php

require_once '../vendor/autoload.php';

$srcDir     = __DIR__.'/../srcss';
$namespace  = 'alphayax\mdGen';

$gen = new \alphayax\mdGen\MdGen( $srcDir, $namespace);
$gen->generate( '../docs/md_gen');
