<?php
namespace alphayax\mdGen\models;

class ClassChapter {

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
}
