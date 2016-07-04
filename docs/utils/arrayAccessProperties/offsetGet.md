
# offsetGet

**Class** : arrayAccessProperties
**Namespace**  : alphayax\mdGen\utils


> Offset to retrieve


#### Signature

```php
 public function offsetGet($offset);
```

#### Parameters

| Name | Type | Description |
|---|---|---|
| `$offset` | mixed | &lt;p&gt; The offset to retrieve. &lt;/p&gt; |

#### Return

    mixed Can return all value types.

## Implementation

```php
    public function offsetGet( $offset) {
        return $this->$offset;
    }

```