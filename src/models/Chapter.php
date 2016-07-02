<?php
namespace alphayax\mdGen\models;
use alphayax\mdGen\utils;

/**
 * Class Chapter
 * @package alphayax\mdGen\models
 */
class Chapter implements \ArrayAccess {
    use utils\arrayAccessProperties;

    /** @var string */
    protected $class;

    /** @var \ReflectionClass */
    protected $reflexion;

    /** @var Method[] */
    protected $methods;

    /**
     * ClassChapter constructor.
     * @param string $class
     */
    public function __construct( $class){
        $this->class = $class;
        $this->reflexion = new \ReflectionClass( $class);

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

            $this->methods[] = new Method( $this->reflexion->getName(), $method->getName());
        }
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
     * Get the reflected class
     * @return \ReflectionClass
     */
    public function getReflexion(){
        return $this->reflexion;
    }

}
