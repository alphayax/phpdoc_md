**Namespace**  : [alphayax\mdGen\models](../__NAMESPACE__.md) -
**Class** : [ClassMd](__CLASS__.md)

## `ClassMd::offsetUnset`

#### Description

> Offset to unset

#### Signature

```php
 public function offsetUnset($offset);
```

#### Parameters

| Name | Type | Description |
|---|---|---|
| `$offset` | mixed | &lt;p&gt; The offset to unset. &lt;/p&gt; |

#### Return

    void 

#### Implementation

```php
    public function offsetUnset($offset) {
        $this->$offset = null;
    }

```
