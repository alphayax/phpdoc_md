**Namespace**  : alphayax\mdGen  - **Class** : MdGen

## `MdGen::filterSubClasses`

#### Description

> Filter class who are sub-classes of a specific class


#### Signature

```php
 public function filterSubClasses($className);
```

#### Parameters

| Name | Type | Description |
|---|---|---|
| `$className` | string | Super class name to filter |

#### Return


#### Implementation

```php
    public function filterSubClasses( $className) {
        $FilteredClasses = [];
        foreach( $this->loadedClasses as $loadedClass){
            if( is_subclass_of( $loadedClass, $className)){
                $FilteredClasses[] = $loadedClass;
            }
        }
        $this->loadedClasses = $FilteredClasses;
    }

```
