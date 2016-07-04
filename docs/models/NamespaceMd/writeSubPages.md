**Namespace**  : [alphayax\mdGen\models](../__NAMESPACE__.md) -
**Class** : [NamespaceMd](__CLASS__.md)

## `NamespaceMd::writeSubPages`

#### Description

> Write sub pages of this page

#### Signature

```php
 public function writeSubPages();
```

#### Parameters

> No parameters

#### Return

> No Return

#### Implementation

```php
    public function writeSubPages() {
        foreach( $this->subPages as $subPageName => $subPage) {
            $subPageDirectory = $this->page_rd . DIRECTORY_SEPARATOR . $subPageName;
            $subPage->setDirectory( $subPageDirectory);
            $subPage->write();
        }
    }

```
