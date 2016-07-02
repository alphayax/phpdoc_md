<?php


class MdGenTest extends \PHPUnit_Framework_TestCase {

    public function testGeneration(){

        $srcDir     = __DIR__.'/../src';
        $namespace  = 'alphayax\mdGen';

        $gen = new \alphayax\mdGen\MdGen( $srcDir, $namespace);
        $gen->generate( '../docs');

    }
}
