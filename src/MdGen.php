<?php
namespace alphayax\mdGen;
use alphayax\mdGen\models\Chapter;

/**
 * Class MdGen
 * @package alphayax\mdGen
 */
class MdGen {

    /** @var string */
    protected $srcDirectory = '';

    /** @var string[] */
    protected $loadedClasses;

    /** @var models\Chapter[] */
    protected $chapters = [];

    /** @var models\Page */
    protected $rootPage;


    /**
     * MdGen constructor.
     * @param $srcDirectory
     * @param $rootNamespace
     */
    public function __construct( $srcDirectory, $rootNamespace){
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

        $objects = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator( $this->srcDirectory), \RecursiveIteratorIterator::SELF_FIRST);
        $Regex = new \RegexIterator( $objects, '/^.+\.php$/i', \RecursiveRegexIterator::GET_MATCH);
        foreach( $Regex as $name => $object){
            if ( ! empty( $name)) {
                require_once $name;
            }
        }

        $this->loadedClasses = get_declared_classes();
    }

    /**
     * Filter class who are in a specific namespace
     * @param $namespaceName
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
     * @param $className
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
     * @return array
     */
    protected function getChaptersFromLoadedClasses(){
        $chapters = [];
        foreach( $this->loadedClasses as $class){
            $chapters[] = new Chapter( $class);
        }
        return $chapters;
    }

    /**
     * Generate markdown files
     * @param string $directory
     */
    public function generate( $directory = '.'){
        $chapters = $this->getChaptersFromLoadedClasses();
        $this->rootPage = new models\Page( $this->rootNamespace, $chapters);
        $this->rootPage->setDirectory( $directory);
        $this->rootPage->write();
    }

}
