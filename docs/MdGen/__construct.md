**Namespace**  : [alphayax\mdGen](../__NAMESPACE__.md) -
**Class** : [MdGen](__CLASS__.md)

## `MdGen::__construct`

#### Description

> MdGen constructor.

#### Signature

```php
 public function __construct($srcDirectory, $rootNamespace);
```

#### Parameters

| Name | Type | Description |
|---|---|---|
| `$srcDirectory` | unknown |  |
| `$rootNamespace` | unknown |  |

#### Return

> No Return

#### Implementation

```php
    public function __construct( $srcDirectory = self::DEFAULT_SRC_DIRECTORY, $rootNamespace){
        $this->rootNamespace = $rootNamespace;
        $this->srcDirectory  = $srcDirectory;
        $this->loadClasses();
        $this->filterNamespace( $rootNamespace);
    }

```
