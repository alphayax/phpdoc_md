
# **Class** MethodMd

Full name : `alphayax\mdGen\models\MethodMd`

## Properties

- reflexion
- name
- description
- params
- return

## Methods summary

| Method | Description |
|---|---|
| `__construct` | MethodMd constructor. |
| `hasParams` |  |
| `getParams` |  |
| `getModifiers` |  |
| `offsetExists` | Whether a offset exists |
| `offsetGet` | Offset to retrieve |
| `offsetSet` | Offset to set |
| `offsetUnset` | Offset to unset |

## Methods details

### `__construct`

__MethodMd constructor.__


#### Signature

```php
 public function __construct(, );
```

#### Parameters

| Name | Type | Description |
|---|---|---|
| `` | $className |  |
| `` | $methodName |  |

#### Return



### `hasParams`

____


#### Signature

```php
 public function hasParams();
```

#### Parameters

    No parameters

#### Return

    bool 


### `getParams`

____


#### Signature

```php
 public function getParams();
```

#### Parameters

    No parameters

#### Return

    string 


### `getModifiers`

____


#### Signature

```php
 public function getModifiers();
```

#### Parameters

    No parameters

#### Return

    string 


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


