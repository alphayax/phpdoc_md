
# **Class** ClassMd

Full name : `alphayax\mdGen\models\ClassMd`

## Properties

- class
- reflexion
- publicMethods
- methods
- type
- properties

## Methods summary

| Method | Description |
|---|---|
| `__construct` | ClassChapter constructor. |
| `computeType` | Determine the type of class |
| `getNextComponent` | Get the next namespace component (according the NS given) |
| `getNamespace` | Get the namespace of the current reflected class |
| `getReflexion` | Get the reflected class |
| `getType` | Return the real kind of class (Trait, Interface, Class) |
| `offsetExists` | Whether a offset exists |
| `offsetGet` | Offset to retrieve |
| `offsetSet` | Offset to set |
| `offsetUnset` | Offset to unset |

## Methods details

### `__construct`

__ClassChapter constructor.__


#### Signature

```php
 public function __construct($class);
```

#### Parameters

| Name | Type | Description |
|---|---|---|
| `$class` | string |  |

#### Return



### `computeType`

__Determine the type of class__


#### Signature

```php
 protected function computeType();
```

#### Parameters

    No parameters

#### Return



### `getNextComponent`

__Get the next namespace component (according the NS given)__


#### Signature

```php
 public function getNextComponent($namespace);
```

#### Parameters

| Name | Type | Description |
|---|---|---|
| `$namespace` | string |  |

#### Return

    string 


### `getNamespace`

__Get the namespace of the current reflected class__


#### Signature

```php
 public function getNamespace();
```

#### Parameters

    No parameters

#### Return



### `getReflexion`

__Get the reflected class__


#### Signature

```php
 public function getReflexion();
```

#### Parameters

    No parameters

#### Return

    \ReflectionClass 


### `getType`

__Return the real kind of class (Trait, Interface, Class)__


#### Signature

```php
 public function getType();
```

#### Parameters

    No parameters

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


