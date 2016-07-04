
# getNamespace

**Namespace**  : alphayax\mdGen\models

**Class** : ClassMd


> Get the namespace of the current reflected class


#### Signature

```php
 public function getNamespace();
```

#### Parameters

    No parameters

#### Return


#### Implementation

```php
    public function getNamespace() {
        return $this->reflexion->getNamespaceName();
    }

```
