<?php
namespace alphayax\mdGen\models;
use alphayax\mdGen\utils;

/**
 * Class Chapter
 * @package alphayax\mdGen\models
 */
class ClassMd implements \ArrayAccess {
    use utils\arrayAccessProperties;

    /** @var string */
    protected $class;

    /** @var \ReflectionClass */
    protected $reflexion;

    /** @var MethodMd[] */
    protected $publicMethods;

    /** @var MethodMd[] */
    protected $methods;

    /** @var string Class type (Interface, Trait or Class) */
    protected $type;

    /** @var array */
    protected $properties = [];

    /**
     * ClassChapter constructor.
     * @param string $class
     */
    public function __construct( $class){
        $this->class = $class;
        $this->reflexion = new \ReflectionClass( $class);
        $this->computeType();
        $properties = $this->reflexion->getProperties();
        foreach ($properties as $property){
            $this->properties[] = $property->getName();
        }

        $methods = $this->reflexion->getMethods();
        foreach ( $methods as $method){

            $methodMd = new MethodMd( $this->reflexion->getName(), $method->getName());
            $this->methods[] = $methodMd;

            /// Filter only public and non constructor methods
            if( ! $method->isPublic() || $method->isConstructor()){
                continue;
            }

            /// Filter only methods inside class (not derived)
            if( $method->getDeclaringClass()->getName() != $this->reflexion->getName()){
                continue;
            }

            $this->publicMethods[] = $methodMd;
        }
    }

    /**
     * Determine the type of class
     */
    protected function computeType(){
        if( interface_exists( $this->class, false)){
            $this->type = 'Interface';
            return;
        }
        if( trait_exists( $this->class, false)){
            $this->type = 'Trait';
            return;
        }
        $this->type = 'Class';
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

    /**
     * Return the real kind of class (Trait, Interface, Class)
     */
    public function getType(){

    }
}
