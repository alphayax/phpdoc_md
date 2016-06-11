<?php
namespace alphayax\mdGen\models;

class Chapter {

    /** @var string */
    protected $class;

    /** @var \ReflectionClass */
    protected $reflexion;

    /**
     * ClassChapter constructor.
     * @param string $class
     */
    public function __construct( $class){
        $this->class = $class;
        $this->reflexion = new \ReflectionClass( $class);
    }

    public function getNextComponent( $namespace) {
        $namespaceComponents = explode( '\\', $namespace);
        $class_x = explode( '\\', $this->class);

        while( array_shift( $namespaceComponents)){
            array_shift( $class_x);
        }

        return array_shift( $class_x);
    }

    /**
     *
     */
    public function getNamespace() {
        return $this->reflexion->getNamespaceName();
    }

    public function getReflexion(){
        return $this->reflexion;
    }


    public function write() {

        $rflxClass = $this->reflexion;

        $generatedMd  = PHP_EOL;
        $generatedMd .= '<a name="'. $rflxClass->getShortName() .'"></a>' . PHP_EOL;
        $generatedMd .= '## '. $rflxClass->getShortName() . PHP_EOL;
        $generatedMd .= PHP_EOL;
        $generatedMd .= '**Class**  : '. $rflxClass->getName() .PHP_EOL;
        $generatedMd .= PHP_EOL;

        $generatedMd .= '### Public methods'. PHP_EOL;
        $generatedMd .= PHP_EOL;
        $generatedMd .= '| Method | Description |'. PHP_EOL;
        $generatedMd .= '|---|---|'. PHP_EOL;

        $methods = $rflxClass->getMethods();
        foreach ( $methods as $method){

            if( ! $method->isPublic()){
                continue;
            }

            if( $method->getDeclaringClass()->getName() != $rflxClass->getName()){
                continue;
            }

            try{
                $method2 = new \Zend_Reflection_Method( $rflxClass->getName(), $method->getName());
                $docBlock = $method2->getDocblock();

                $shortDesc = str_replace( PHP_EOL, ' ', $docBlock->getShortDescription());
                $desc = str_replace( PHP_EOL, ' ', $shortDesc);
                $generatedMd .= '| `'. $method2->getName() .'` | '. $desc . ' | ' . PHP_EOL;
            }
            catch( \Exception $e){
                // Unable to parse PHPDoc Block... Skip it :(
            }

        }

        return $generatedMd;

    }
}
