<?php
namespace alphayax\mdGen;
use alphayax\mdGen\models\ClassChapter;
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
     * @param $chapterNamespace
     */
    public function addChapter( $chapterNamespace) {
        $chapter = new models\Chapter( $chapterNamespace);
        foreach( $this->loadedClasses as $class){
            if( 0 === substr_compare( $class, $chapterNamespace, 0, strlen( $chapterNamespace))){
                $chapter->addClass( $class);
            }
        }
        $this->chapters[] = $chapter;
    }

    /**
     *
     */
    public function generate() {

        $result = [];

        foreach( $this->loadedClasses as $class){

            $result[] = new ClassChapter( $class);

        }



        $this->rootPage = new models\Page( $this->rootNamespace, $result);
        $this->rootPage->setDirectory( '.');
        $this->rootPage->write();

        print_r( $this->rootPage);
/*
        foreach( $this->chapters as $chapter){
            $chapter->generate();
        }
*/
    }

}
