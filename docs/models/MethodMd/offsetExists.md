
# offsetExists

**Class** : MethodMd
**Namespace**  : alphayax\mdGen\models


> Whether a offset exists


#### Signature

```php
 public function offsetExists($offset);
```

#### Parameters

| Name | Type | Description |
|---|---|---|
| `$offset` | mixed | &lt;p&gt; An offset to check for. &lt;/p&gt; |

#### Return

    boolean true on success or false on failure.

## Implementation

```php
    public function offsetExists($offset) {
        return property_exists( static::class, $offset);
    }

```
