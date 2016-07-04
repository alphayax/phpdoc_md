**Namespace**  : alphayax\mdGen\models  - **Class** : ClassMd

## `ClassMd::computeType`

#### Description

> Determine the type of class


#### Signature

```php
 protected function computeType();
```

#### Parameters

    No parameters

#### Return


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
