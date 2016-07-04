
# writeMdClasses

**Namespace**  : alphayax\mdGen\models

**Class** : NamespaceMd


> 


#### Signature

```php
 protected function writeMdClasses();
```

#### Parameters

    No parameters

#### Return


#### Implementation

```php
    protected function writeMdClasses() {
        foreach( $this->classMds as $classMd){
            $classMd->write( $this->page_rd);
        }
    }

```
