
# hasParams

**Class** : MethodMd
**Namespace**  : alphayax\mdGen\models


> 


#### Signature

```php
 public function hasParams();
```

#### Parameters

    No parameters

#### Return

    bool 

## Implementation

```php
    public function hasParams() {
        return ! empty( $this->params);
    }

```
