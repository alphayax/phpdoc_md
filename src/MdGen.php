<?php
namespace alphayax\mdGen;
use alphayax\mdGen\models\ClassMd;

/**
 * Class MdGen
 * @package alphayax\mdGen
 */
class MdGen {

    /// Default values
    const DEFAULT_SRC_DIRECTORY = '';

    /** @var string Source directory. PHP Files will be scanned in this folder */
    protected $srcDirectory = '';

    /** @var string[] List of all founded PHP Classes, Interfaces and Traits */
    protected $loadedClasses;

    /** @var models\ClassMd[] Filtered list of PHP Classes, Interfaces and Traits */
    protected $chapters = [];

    /** @var models\NamespaceMd Root Namespace */
    protected $rootPage;


    /**
     * MdGen constructor.
     * @param $srcDirectory
     * @param $rootNamespace
     */
    public function __construct( $srcDirectory = self::DEFAULT_SRC_DIRECTORY, $rootNamespace){
        $this->rootNamespace = $rootNamespace;
        $this->srcDirectory  = $srcDirectory;
        $this->loadClasses();
        $this->filterNamespace( $rootNamespace);
    }

    /**
     * Load class in the source directory
     */
    protected function loadClasses(){
        if( ! is_dir( $this->srcDirectory)){
            throw new \Exception( 'Source directory not found : '. $this->srcDirectory);
        }

        /// Recursively scan PHP Files
        $objects = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator( $this->srcDirectory), \RecursiveIteratorIterator::SELF_FIRST);
        $Regex = new \RegexIterator( $objects, '/^.+\.php$/i', \RecursiveRegexIterator::GET_MATCH);
        foreach( $Regex as $name => $object){
            if ( ! empty( $name)) {
                require_once $name;
            }
        }

        /// Extract data from loaded classes
        $classes    = get_declared_classes();
        $traits     = get_declared_traits();
        $interfaces = get_declared_interfaces();
        $this->loadedClasses = array_merge( $classes, $traits, $interfaces);
    }

    /**
     * Filter class who are in a specific namespace
     * @param string $namespaceName Namespace Name to filter
     */
    public function filterNamespace( $namespaceName) {
        $FilteredClasses = [];
        foreach( $this->loadedClasses as $loadedClass){
            if( 0 == substr_compare( $loadedClass, $namespaceName, 0, strlen( $namespaceName))){
                $FilteredClasses[] = $loadedClass;
            }
        }
        $this->loadedClasses = $FilteredClasses;
    }

    /**
     * Filter class who are sub-classes of a specific class
     * @param string $className Super class name to filter
     */
    public function filterSubClasses( $className) {
        $FilteredClasses = [];
        foreach( $this->loadedClasses as $loadedClass){
            if( is_subclass_of( $loadedClass, $className)){
                $FilteredClasses[] = $loadedClass;
            }
        }
        $this->loadedClasses = $FilteredClasses;
    }

    /**
     * Create a chapter form loaded classes
     * @return ClassMd[]
     */
    protected function generateClassMdFromLoadedClasses(){
        $classMds = [];
        foreach( $this->loadedClasses as $class){
            $classMds[] = new ClassMd( $class);
        }
        return $classMds;
    }

    /**
     * Generate markdown files
     * @param string $directory Path to generated files
     */
    public function generate( $directory = '.'){
        $chapters = $this->generateClassMdFromLoadedClasses();
        $this->rootPage = new models\NamespaceMd( $this->rootNamespace, $chapters);
        $this->rootPage->setDirectory( $directory);
        $this->rootPage->write();
    }

}
