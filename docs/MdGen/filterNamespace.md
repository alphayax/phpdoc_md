
# filterNamespace

**Namespace**  : alphayax\mdGen

**Class** : MdGen


> Filter class who are in a specific namespace


#### Signature

```php
 public function filterNamespace($namespaceName);
```

#### Parameters

| Name | Type | Description |
|---|---|---|
| `$namespaceName` | string | Namespace Name to filter |

#### Return


#### Implementation

```php
    public function filterNamespace( $namespaceName) {
        $FilteredClasses = [];
        foreach( $this->loadedClasses as $loadedClass){
            if( 0 == substr_compare( $loadedClass, $namespaceName, 0, strlen( $namespaceName))){
                $FilteredClasses[] = $loadedClass;
            }
        }
        $this->loadedClasses = $FilteredClasses;
    }

```
