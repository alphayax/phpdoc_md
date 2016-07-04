**Namespace**  : alphayax\mdGen\models  - **Class** : ClassMd

## `ClassMd::getNextComponent`

#### Description

> Get the next namespace component (according the NS given)


#### Signature

```php
 public function getNextComponent($namespace);
```

#### Parameters

| Name | Type | Description |
|---|---|---|
| `$namespace` | string |  |

#### Return

    string 

#### Implementation

```php
    public function getNextComponent( $namespace) {
        $namespaceComponents = explode( '\\', $namespace);
        $class_x = explode( '\\', $this->class);

        while( array_shift( $namespaceComponents)){
            array_shift( $class_x);
        }

        return array_shift( $class_x);
    }

```
