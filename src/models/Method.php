<?php
namespace alphayax\mdGen\models;
use alphayax\mdGen\utils;

/**
 * Class Method
 * @package alphayax\mdGen\models
 */
class Method implements \ArrayAccess {
    use utils\arrayAccessProperties;

    protected $name;

    protected $description;

    protected $params = [];

    protected $return;

    public function __construct($className, $methodName) {

        try {

            $method2 = new \Zend_Reflection_Method($className, $methodName);

            $this->name = $method2->getName();
            $docBlock = $method2->getDocblock();
            $shortDesc = str_replace(PHP_EOL, ' ', $docBlock->getShortDescription());
            $this->description = str_replace(PHP_EOL, ' ', $shortDesc);

        } catch (\Exception $e) {
            // Unable to parse PHPDoc Block... Skip it :(
        }
    }
    
}
