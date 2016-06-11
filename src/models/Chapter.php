<?php
namespace alphayax\mdGen\models;

/**
 * Class Chapter
 * @package alphayax\mdGen\models
 */
class Chapter {

    /** @var string : Chapter namespace */
    protected $namespace;

    /** @var string : Chapter name */
    protected $name;

    /** @var string[] : array of classes into chapters */
    protected $classes;

    /**
     * Chapter constructor.
     * @param $chapterNamespace
     */
    public function __construct( $chapterNamespace) {
        $namespaceComponents = explode( '\\', $chapterNamespace);
        $this->namespace = $chapterNamespace;
        $this->name      = array_pop( $namespaceComponents);
    }

    /**
     * @return string
     */
    public function getNamespace() {
        return $this->namespace;
    }

    /**
     * @return string
     */
    public function getName() {
        return $this->name;
    }

    /**
     * @param $class
     */
    public function addClass( $class) {
        $this->classes[] = $class;
    }

    public function generate() {
        $generatedMd = PHP_EOL;
        $generatedMd .= '# '. $this->name . PHP_EOL;

        foreach ( $this->classes as $class){
            $rflxClass = new \ReflectionClass( $class);

            $generatedMd .= PHP_EOL;
            $generatedMd .= '## '. $rflxClass->getShortName() . PHP_EOL;
            $generatedMd .= PHP_EOL;
            $generatedMd .= '**Namespace**  : '. $rflxClass->getNamespaceName() .PHP_EOL;
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

                if( $method->getDeclaringClass()->getName() != $class){
                    continue;
                }

                $method2 = new \Zend_Reflection_Method( $class, $method->getName());

                $docBlock = $method2->getDocblock();
                $generatedMd .= '| `'. $method2->getName() .'` | '. $docBlock->getShortDescription() . ' | ' . PHP_EOL;
            //    print_r( $docBlock);

            }


        }
        file_put_contents( $this->name . '.md', $generatedMd);
    //    echo $generatedMd;
    }
}
