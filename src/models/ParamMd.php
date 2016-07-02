<?php
namespace alphayax\mdGen\models;
use alphayax\mdGen\utils;

/**
 * Class Chapter
 * @package alphayax\mdGen\models
 */
class ParamMd implements \ArrayAccess {
    use utils\arrayAccessProperties;

    protected $type;

    protected $description;

    protected $variableName;

    /**
     * ParamMd constructor.
     * @param \Zend_Reflection_Docblock_Tag_Param $param
     */
    public function __construct( \Zend_Reflection_Docblock_Tag_Param $param){
        $this->type         = $param->getType();
        $this->description  = $param->getDescription();
        $this->variableName = $param->getVariableName();
    }

}
