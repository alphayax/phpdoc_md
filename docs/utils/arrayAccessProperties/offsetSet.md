**Namespace**  : [alphayax\mdGen\utils](../__NAMESPACE__.md) -
**Class** : [arrayAccessProperties](__CLASS__.md)

## `arrayAccessProperties::offsetSet`

#### Description

> Offset to set

#### Signature

```php
 public function offsetSet($offset, $value);
```

#### Parameters

| Name | Type | Description |
|---|---|---|
| `$offset` | mixed | &lt;p&gt; The offset to assign the value to. &lt;/p&gt; |
| `$value` | mixed | &lt;p&gt; The value to set. &lt;/p&gt; |

#### Return

    void 

#### Implementation

```php
    public function offsetSet( $offset, $value) {
        $this->$offset = $value;
    }

```
