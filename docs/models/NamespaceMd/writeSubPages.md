
# writeSubPages

**Class** : NamespaceMd
**Namespace**  : alphayax\mdGen\models


> Write sub pages of this page


#### Signature

```php
 public function writeSubPages();
```

#### Parameters

    No parameters

#### Return


## Implementation

```php
    public function writeSubPages() {
        foreach( $this->subPages as $subPageName => $subPage) {
            $subPageDirectory = $this->page_rd . DIRECTORY_SEPARATOR . $subPageName;
            $subPage->setDirectory( $subPageDirectory);
            $subPage->write();
        }
    }

```
