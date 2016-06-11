<?php
namespace alphayax\mdGen\models;

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
     * @param Chapter[] $classes
     */
    public function __construct( $pageNamespace, array $classes) {
        $this->namespace = $pageNamespace;
        $this->pageName  = $this->computePageName();
        $this->page_bfe  = $this->pageName . '.md';

        $tutu = [];
        foreach( $classes as $class){

            if( $class->getNamespace() == $pageNamespace){
                $this->chapters[] = $class;
                continue;
            }

            $component = $class->getNextComponent( $pageNamespace);
            $tutu[ $component][] = $class;
        }

        $subPages = array_keys( $tutu);
        foreach( $subPages as $subPage){
            $this->subPages[$subPage] = new Page( $pageNamespace . '\\'. $subPage, $tutu[$subPage]);
        }

    }

    protected function computePageName(){
        $namespaceComponents = explode( '\\', $this->namespace);
        return array_pop( $namespaceComponents);
    }

    public function generateTree( $pad = '', $relativePath = '') {

        $generatedMd = '';

        /// TODO : Les liens relatifs profonds ne sont pas bons

        if( ! empty( $this->subPages)){
            /// SubPages
            foreach( $this->subPages as $subPageName => $subPage){
                $subPageFile  = './' . $relativePath . $subPageName . DIRECTORY_SEPARATOR . $subPage->getPageBfe();
                $generatedMd .=  "$pad- [$subPageName]($subPageFile)". PHP_EOL;
                $generatedMd .= $subPage->generateTree( $pad . '  ', $subPageName . DIRECTORY_SEPARATOR);
            }
        }

        /// Chapters
        if( ! empty( $this->chapters)){
            foreach( $this->chapters as $chapter){
                $chapterName   = $chapter->getReflexion()->getShortName();
                $chapterAnchor = '#'.$chapter->getReflexion()->getShortName();
                $generatedMd  .= "$pad- [$chapterName]($chapterAnchor)" . PHP_EOL;
            }
        }

        return $generatedMd;
    }

    public function write(){

        $generatedMd  = '';
        $generatedMd .= '# '. $this->pageName . PHP_EOL;
        $generatedMd .= PHP_EOL;
        $generatedMd .= $this->generateTree();
        $generatedMd .= PHP_EOL;

        /// SubPages
        foreach( $this->subPages as $subPageName => $subPage){
            $subPageDirectory   = $this->page_rd . DIRECTORY_SEPARATOR . $subPageName;
            $subPage->setDirectory( $subPageDirectory);
            $subPage->write();
        }


        /// Class
        foreach ( $this->chapters as $class){
            $generatedMd .= $class->write();
        }

        @mkdir( $this->page_rd, 0777, true);
        file_put_contents( $this->page_rd . DIRECTORY_SEPARATOR . $this->page_bfe, $generatedMd);
    }


    public function setDirectory( $string) {
        $this->page_rd = $string;
    }

    /**
     * @return string
     */
    public function getPageBfe() {
        return $this->page_bfe;
    }


}
