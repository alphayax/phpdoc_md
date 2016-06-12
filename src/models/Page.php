<?php
namespace alphayax\mdGen\models;

/**
 * Class Page
 * @package alphayax\mdGen\models
 */
class Page {

    /** @var Chapter[] */
    protected $chapters = [];

    /** @var Page[] */
    protected $subPages = [];

    /** @var string */
    protected $namespace = '';

    /** @var string : Base name of page */
    protected $page_bfe = '';

    /** @var string : Relative path to directory page */
    protected $page_rd = '';

    /**
     * Page constructor
     * @param string    $pageNamespace
     * @param Chapter[] $chapters
     */
    public function __construct( $pageNamespace, array $chapters) {
        $this->namespace = $pageNamespace;
        $this->pageName  = $this->computePageName();
        $this->page_bfe  = $this->pageName . '.md';

        $pagesBtComponents = [];
        foreach( $chapters as $chapter){

            if( $chapter->getNamespace() == $pageNamespace){
                $this->chapters[] = $chapter;
                continue;
            }

            $component = $chapter->getNextComponent( $pageNamespace);
            $pagesBtComponents[ $component][] = $chapter;
        }

        $subPages = array_keys( $pagesBtComponents);
        foreach( $subPages as $subPage){
            $this->subPages[$subPage] = new Page( $pageNamespace . '\\'. $subPage, $pagesBtComponents[$subPage]);
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

        /// SubPages
        if( ! empty( $this->subPages)){
            foreach( $this->subPages as $subPageName => $subPage){
                $subPageFile  = './' . $relativePath . $subPageName . DIRECTORY_SEPARATOR . $subPage->getPageBfe();
                $generatedMd .=  "$pad- [$subPageName]($subPageFile)". PHP_EOL;
                $generatedMd .= $subPage->generateTree( $pad . '    ', $relativePath . $subPageName . DIRECTORY_SEPARATOR);
            }
        }

        /// Chapters
        if( ! empty( $this->chapters)){
            foreach( $this->chapters as $chapter){
                $chapterName   = $chapter->getReflexion()->getShortName();
                $chapterFile   = $relativePath . $this->getPageBfe();
                $chapterAnchor = $chapterFile .'#'. $chapter->getReflexion()->getShortName();
                $generatedMd  .= "$pad- [$chapterName]($chapterAnchor)" . PHP_EOL;
            }
        }

        return $generatedMd;
    }

    /**
     * Write markdown file
     */
    public function write(){
        $generatedMd  = '';
        $generatedMd .= $this->generateHeader();
        $generatedMd .= $this->generateChapters();

        $this->writeSubPages();

        /// Write page
        @mkdir( $this->page_rd, 0777, true);
        file_put_contents( $this->page_rd . DIRECTORY_SEPARATOR . $this->page_bfe, $generatedMd);
    }

    /**
     * Write sub pages of this page
     */
    public function writeSubPages() {
        foreach( $this->subPages as $subPageName => $subPage) {
            $subPageDirectory = $this->page_rd . DIRECTORY_SEPARATOR . $subPageName;
            $subPage->setDirectory($subPageDirectory);
            $subPage->write();
        }
    }

    /**
     * Generate page chapters
     * @return string
     */
    protected function generateChapters() {
        $generatedMd  = '';
        foreach( $this->chapters as $class){
            $generatedMd .= $class->generate();
        }
        return $generatedMd;
    }


    /**
     * Generate page header
     * @return string
     */
    protected function generateHeader() {
        $generatedMd  = '';
        $generatedMd .= '# '. $this->pageName . PHP_EOL;
        $generatedMd .= PHP_EOL;

        $generatedMd .= '**Namespace**  : '. $this->namespace .PHP_EOL;
        $generatedMd .= PHP_EOL;

        $generatedMd .= '# Overview'. PHP_EOL;
        $generatedMd .= PHP_EOL;

        $generatedMd .= $this->generateTree();
        $generatedMd .= PHP_EOL;

        return $generatedMd;
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
     * @return string
     */
    public function getPageBfe() {
        return $this->page_bfe;
    }

}
