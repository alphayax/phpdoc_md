<?php
namespace alphayax\mdgen;

require_once '../vendor/autoload.php';

use alphayax\freebox\api\v3\Model;
use alphayax\utils\file_system\Directory;

function tutu(){

    /// Load Models
    $ModelsDir = new Directory( __DIR__ . '/../vendor/alphayax/freebox_api_php/freebox/api/v3/models');
    $ModelFiles = $ModelsDir->getFilesByExtension( 'php', true);
    foreach ($ModelFiles as $modelFile){
        require_once $modelFile;
    }

    /// Get models subClasses
    $LoadedClasses = get_declared_classes();
    $ModelClasses = [];
    foreach( $LoadedClasses as $loadedClass){
        if( is_subclass_of( $loadedClass, Model::class)){
            $ModelClasses[] = $loadedClass;
        }
    }

    /// Test classes
    foreach( $ModelClasses as $modelClass){
        $ModelReflect = new \ReflectionClass( $modelClass);

        $ClassArgs = [];
        $properties = $ModelReflect->getProperties();
        foreach ( $properties as $property){
            $ClassArgs[$property->getName()] = '';
        }

        echo "---" . PHP_EOL;
        echo $modelClass . PHP_EOL;

        $Model = new $modelClass($ClassArgs);

        $methods = $ModelReflect->getMethods();
        foreach ( $methods as $method){

            $method = new \Zend_Reflection_Method( $Model, $method->getName());
            $docBlock = $method->getDocblock();
            echo "\t- " . $method->getName() . PHP_EOL;

            continue;

            $args = [];
            if($docBlock->hasTag('param')) {
                /** @var \Zend_Reflection_Docblock_Tag_Param[] $tagParams */
                $tagParams = $docBlock->getTags('param'); // $tagReturn is an instance of Zend_Reflection_Docblock_Tag_Return
                foreach ( $tagParams as $tagParam){
                    echo "Param Type : " . $tagParam->getType() . PHP_EOL;

                    switch( $tagParam->getType()){
                        case 'string' : $args[] = $tagParam->getName(); break;
                        case 'bool':
                        case 'boolean': $args[] = true; break;
                        case 'array' : $args[] = []; break;
                        default : print_r( $tagParam); return;
                    }
                }
            }

            $a = $method->invokeArgs( $Model, $args);

            if( $docBlock->hasTag('return')) {
                /** @var \Zend_Reflection_Docblock_Tag_Return $tagReturn */
                $tagReturn = $docBlock->getTag('return');
                echo "Returns a: " . $tagReturn->getType() . PHP_EOL;

                $this->assertInternalType( $tagReturn->getType(), $a);
                /*
                switch( $tagReturn->getType()){
                    case 'string' : $this->assertInternalType( string); break;
                    case 'bool':
                    case 'boolean': $args[] = true; break;
                    case 'array' : $args[] = []; break;
                    default : print_r( $tagParam); return;
                }
                */
            }


        }
    }

}

tutu();
