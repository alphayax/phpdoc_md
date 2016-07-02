<?php
namespace alphayax\mdGen\models;
use alphayax\mdGen\utils;

/**
 * Class Method
 * @package alphayax\mdGen\models
 */
class MethodMd implements \ArrayAccess {
    use utils\arrayAccessProperties;

    /** @var \Zend_Reflection_Method */
    protected $reflexion;

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

            $this->reflexion = new \Zend_Reflection_Method( $className, $methodName);

            $this->name = $this->reflexion->getName();
            $docBlock = $this->reflexion->getDocblock();

            /// Desc
            $shortDesc = str_replace(PHP_EOL, ' ', $docBlock->getShortDescription());
            $this->description = str_replace(PHP_EOL, ' ', $shortDesc);

            /// Params
            /** @var \Zend_Reflection_Docblock_Tag_Param[] $params */
            $params = $docBlock->getTags( 'param');
            foreach ( $params as $param){
                $this->params[] = new ParamMd( $param);
            }

            /** @var \Zend_Reflection_Docblock_Tag_Return $return */
            $return = $docBlock->getTag( 'return');
            if( $return){
                $this->return = $return->getType() . ' ' . $return->getDescription();
            }



        } catch (\Exception $e) {
            // Unable to parse PHPDoc Block... Skip it :(
        }
    }

    /**
     * @return bool
     */
    public function hasParams() {
        return ! empty( $this->params);
    }

    /**
     * @return string
     */
    public function getParams(){
        $variablesNames = [];
        foreach( $this->params as $param){
            $variablesNames[] = $param['variableName'];
        }
        return implode(', ', $variablesNames);
    }

    /**
     * @return string
     */
    public function getModifiers() {
        return
            ($this->reflexion->isFinal()     ? ' final'      : '').
            ($this->reflexion->isAbstract()  ? ' abstract'   : '').
            ($this->reflexion->isPublic()    ? ' public'     : '').
            ($this->reflexion->isProtected() ? ' protected'  : '').
            ($this->reflexion->isPrivate()   ? ' private'    : '').
            ($this->reflexion->isStatic()    ? ' static'     : '');

    }

}
