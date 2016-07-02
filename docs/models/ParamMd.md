
# **Class** ParamMd

Full name : `alphayax\mdGen\models\ParamMd`

## Properties

- type
- description
- variableName

## Methods summary

| Method | Description |
|---|---|
| `__construct` | ParamMd constructor. |
| `offsetExists` | Whether a offset exists |
| `offsetGet` | Offset to retrieve |
| `offsetSet` | Offset to set |
| `offsetUnset` | Offset to unset |

## Methods details

### `__construct`

__ParamMd constructor.__


#### Signature

```php
 public function __construct($param);
```

#### Parameters

| Name | Type | Description |
|---|---|---|
| `$param` | \Zend_Reflection_Docblock_Tag_Param |  |

#### Return



### `offsetExists`

__Whether a offset exists__


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


### `offsetGet`

__Offset to retrieve__


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


### `offsetSet`

__Offset to set__


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


### `offsetUnset`

__Offset to unset__


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


