**Namespace**  : [alphayax\mdGen\models](../__NAMESPACE__.md) -
**Class** : [NamespaceMd](__CLASS__.md)

## `NamespaceMd::writeMdClasses`

#### Description

> 

#### Signature

```php
 protected function writeMdClasses();
```

#### Parameters

> No parameters

#### Return

> No Return

#### Implementation

```php
    protected function writeMdClasses() {
        foreach( $this->classMds as $classMd){
            $classMd->write( $this->page_rd);
        }
    }

```
