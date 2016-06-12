<?php
namespace alphayax\mdGen\models;

/**
 * Class Chapter
 * @package alphayax\mdGen\models
 */
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

    /**
     * Get the next namespace component (according the NS given)
     * @param string $namespace
     * @return string
     */
    public function getNextComponent( $namespace) {
        $namespaceComponents = explode( '\\', $namespace);
        $class_x = explode( '\\', $this->class);

        while( array_shift( $namespaceComponents)){
            array_shift( $class_x);
        }

        return array_shift( $class_x);
    }

    /**
     * Get the namespace of the current reflected class
     */
    public function getNamespace() {
        return $this->reflexion->getNamespaceName();
    }

    /**
     * @return \ReflectionClass
     */
    public function getReflexion(){
        return $this->reflexion;
    }

    /**
     * @return string
     */
    public function generate() {

        /// Anchor + title 2
        $generatedMd  = PHP_EOL;
        $generatedMd .= '<a name="'. $this->reflexion->getShortName() .'"></a>' . PHP_EOL;
        $generatedMd .= '## '. $this->reflexion->getShortName() . PHP_EOL;

        /// Class full name
        $generatedMd .= PHP_EOL;
        $generatedMd .= '**Class**  : '. $this->reflexion->getName() .PHP_EOL;

        /// Public methods
        $generatedMd .= $this->generatePublicMethods();

        return $generatedMd;
    }

    /**
     * @return string
     */
    protected function generatePublicMethods() {
        $generatedMd  = PHP_EOL;
        $generatedMd .= '### Public methods'. PHP_EOL;

        $generatedMd .= PHP_EOL;
        $generatedMd .= '| Method | Description |'. PHP_EOL;
        $generatedMd .= '|---|---|'. PHP_EOL;

        $methods = $this->reflexion->getMethods();
        foreach ( $methods as $method){

            /// Filter only public and non constructor methods
            if( ! $method->isPublic() || $method->isConstructor()){
                continue;
            }

            /// Filter only methods inside class (not derived)
            if( $method->getDeclaringClass()->getName() != $this->reflexion->getName()){
                continue;
            }

            try{
                $method2 = new \Zend_Reflection_Method( $this->reflexion->getName(), $method->getName());
                $docBlock = $method2->getDocblock();

                $shortDesc  = str_replace( PHP_EOL, ' ', $docBlock->getShortDescription());
                $desc       = str_replace( PHP_EOL, ' ', $shortDesc);
                $generatedMd .= '| `'. $method2->getName() .'` | '. $desc . ' | ' . PHP_EOL;
            }
            catch( \Exception $e){
                // Unable to parse PHPDoc Block... Skip it :(
            }

        }

        return $generatedMd;
    }
    
}
