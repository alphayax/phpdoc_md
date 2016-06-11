<?php
namespace alphayax\mdGen;
use alphayax\mdGen\models\Chapter;
use alphayax\utils\file_system\Directory;

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
    }

    /**
     * Load class in the source directory
     */
    protected function loadClasses(){
        $ModelsDir = new Directory( $this->srcDirectory);
        $ModelFiles = $ModelsDir->getFilesByExtension( 'php', true);
        foreach ($ModelFiles as $modelFile){
            require_once $modelFile;
        }

        /// TODO : Filter sur le namespace donné dans le constructeur ?
        $this->loadedClasses = get_declared_classes();
    }

    /**
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
     *
     */
    public function generate() {

        $result = [];

        foreach( $this->loadedClasses as $class){
            $result[] = new Chapter( $class);
        }

        $this->rootPage = new models\Page( $this->rootNamespace, $result);
        $this->rootPage->setDirectory( '.');
        $this->rootPage->write();

    }

}
