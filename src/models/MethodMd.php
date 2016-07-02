<?php
namespace alphayax\mdGen\models;
use alphayax\mdGen\utils;

/**
 * Class Method
 * @package alphayax\mdGen\models
 */
class MethodMd implements \ArrayAccess {
    use utils\arrayAccessProperties;

    /** @var string Method Name */
    protected $name;

    /** @var string Method Short Description */
    protected $description;

    /** @var array Method Params */
    protected $params = [];

    /** @var mixed Method Return */
    protected $return;

    /**
     * MethodMd constructor.
     * @param $className
     * @param $methodName
     */
    public function __construct($className, $methodName) {

        try {

            $method2 = new \Zend_Reflection_Method( $className, $methodName);

            $this->name = $method2->getName();
            $docBlock = $method2->getDocblock();
            $shortDesc = str_replace(PHP_EOL, ' ', $docBlock->getShortDescription());
            $this->description = str_replace(PHP_EOL, ' ', $shortDesc);

        } catch (\Exception $e) {
            // Unable to parse PHPDoc Block... Skip it :(
        }
    }

}
