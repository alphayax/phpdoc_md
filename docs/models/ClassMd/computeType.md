**Namespace**  : [alphayax\mdGen\models](../__NAMESPACE__.md) -
**Class** : [ClassMd](__CLASS__.md)

## `ClassMd::computeType`

#### Description

> Determine the type of class

#### Signature

```php
 protected function computeType();
```

#### Parameters

> No parameters

#### Return

> No Return

#### Implementation

```php
    protected function computeType(){
        if( interface_exists( $this->class, false)){
            $this->type = 'Interface';
            return;
        }
        if( trait_exists( $this->class, false)){
            $this->type = 'Trait';
            return;
        }
        $this->type = 'Class';
    }

```
