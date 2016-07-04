**Namespace**  : [alphayax\mdGen\models](../__NAMESPACE__.md) -
**Class** : [NamespaceMd](__CLASS__.md)

## `NamespaceMd::write`

#### Description

> Write markdown file

#### Signature

```php
 public function write();
```

#### Parameters

> No parameters

#### Return

> No Return

#### Implementation

```php
    public function write(){

        $m = new \Mustache_Engine([
            'loader' => new \Mustache_Loader_FilesystemLoader( __DIR__.'/../views')
        ]);
        $template = $m->loadTemplate('Namespace');

        $generatedMd = $template->render( $this);

        /// Write page
        @mkdir( $this->page_rd, 0777, true);
        file_put_contents( $this->page_rd . DIRECTORY_SEPARATOR . $this->page_bfe, $generatedMd);


        $this->writeMdClasses();
        $this->writeSubPages();
    }

```
