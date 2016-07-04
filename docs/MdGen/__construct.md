
# __construct

**Namespace**  : alphayax\mdGen

**Class** : MdGen


> MdGen constructor.


#### Signature

```php
 public function __construct(, );
```

#### Parameters

| Name | Type | Description |
|---|---|---|
| `` | $srcDirectory |  |
| `` | $rootNamespace |  |

#### Return


#### Implementation

```php
    public function __construct( $srcDirectory, $rootNamespace){
        $this->rootNamespace = $rootNamespace;
        $this->srcDirectory  = $srcDirectory;
        $this->loadClasses();
        $this->filterNamespace( $rootNamespace);
    }

```
