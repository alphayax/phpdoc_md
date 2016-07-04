<?php
namespace alphayax\mdGen\models;
use alphayax\mdGen\utils;

/**
 * Class Page
 * @package alphayax\mdGen\models
 */
class NamespaceMd implements \ArrayAccess {
    use utils\arrayAccessProperties;

    /** @var ClassMd[] */
    protected $classMds = [];

    /** @var NamespaceMd[] */
    protected $subPages = [];

    /** @var string */
    protected $namespace = '';

    /** @var string : Base name of page */
    protected $page_bfe = '';

    /** @var string : Relative path to directory page */
    protected $page_rd = '';

    /** @var string */
    protected $pageName;

    /**
     * Page constructor
     * @param string    $pageNamespace
     * @param ClassMd[] $chapters
     */
    public function __construct( $pageNamespace, array $chapters) {
        $this->namespace = $pageNamespace;
        $this->pageName  = $this->computePageName();
        $this->page_bfe  = '__NAMESPACE__.md';

        $pagesBtComponents = [];
        foreach( $chapters as $chapter){

            if( $chapter->getNamespace() == $pageNamespace){
                $this->classMds[] = $chapter;
                continue;
            }

            $component = $chapter->getNextComponent( $pageNamespace);
            $pagesBtComponents[ $component][] = $chapter;
        }

        $subPages = array_keys( $pagesBtComponents);
        foreach( $subPages as $subPage){
            $this->subPages[$subPage] = new NamespaceMd( $pageNamespace . '\\'. $subPage, $pagesBtComponents[$subPage]);
        }
    }

    /**
     * Compute the page name (according to the page namespace)
     * @return string
     */
    protected function computePageName(){
        $namespaceComponents = explode( '\\', $this->namespace);
        return array_pop( $namespaceComponents);
    }

    /**
     * Generate overview markdown tree
     * @param string $pad
     * @param string $relativePath
     * @return string
     */
    public function generateTree( $pad = '', $relativePath = '') {
        $generatedMd = '';

        /// SubNamespaces
        if( ! empty( $this->subPages)){
            foreach( $this->subPages as $subPageName => $subPage){
                $subPageFile  = './' . $relativePath . $subPageName . DIRECTORY_SEPARATOR . $subPage->getPageBfe();
                $generatedMd .=  "$pad- [$subPageName]($subPageFile)". PHP_EOL;
                $generatedMd .= $subPage->generateTree( $pad . '    ', $relativePath . $subPageName . DIRECTORY_SEPARATOR);
            }
        }

        /// Classes
        if( ! empty( $this->classMds)){
            foreach($this->classMds as $classMd){
                $className   = $classMd->getReflexion()->getShortName();
                $classFile   = $relativePath . $className . DIRECTORY_SEPARATOR . '__CLASS__.md';
                $generatedMd  .= "$pad- [$className]($classFile)" . PHP_EOL;
            }
        }

        return $generatedMd;
    }

    /**
     * Write markdown file
     */
    public function write(){

        $m = new \Mustache_Engine([
            'loader' => new \Mustache_Loader_FilesystemLoader( __DIR__.'/../views')
        ]);
        $template = $m->loadTemplate('Page');

        $generatedMd = $template->render( $this);

        /// Write page
        @mkdir( $this->page_rd, 0777, true);
        file_put_contents( $this->page_rd . DIRECTORY_SEPARATOR . $this->page_bfe, $generatedMd);


        $this->writeMdClasses();
        $this->writeSubPages();
    }

    /**
     *
     */
    protected function writeMdClasses() {
        foreach( $this->classMds as $classMd){
            $classMd->write( $this->page_rd);
        }
    }

    /**
     * Write sub pages of this page
     */
    public function writeSubPages() {
        foreach( $this->subPages as $subPageName => $subPage) {
            $subPageDirectory = $this->page_rd . DIRECTORY_SEPARATOR . $subPageName;
            $subPage->setDirectory( $subPageDirectory);
            $subPage->write();
        }
    }

    /**
     * Define the current page directory
     * @param $string
     */
    public function setDirectory( $string) {
        $this->page_rd = $string;
    }

    /**
     * Return the page basename file with extension
     * @return string The page base name
     */
    public function getPageBfe() {
        return $this->page_bfe;
    }

}
