
# computePageName

**Class** : NamespaceMd
**Namespace**  : alphayax\mdGen\models


> Compute the page name (according to the page namespace)


#### Signature

```php
 protected function computePageName();
```

#### Parameters

    No parameters

#### Return

    string 

## Implementation

```php
    protected function computePageName(){
        $namespaceComponents = explode( '\\', $this->namespace);
        return array_pop( $namespaceComponents);
    }

```
