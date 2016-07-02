
# **Class** NamespaceMd

Full name : `alphayax\mdGen\models\NamespaceMd`

## Properties

- classMds
- subPages
- namespace
- page_bfe
- page_rd
- pageName

## Methods summary

| Method | Description |
|---|---|
| `__construct` | Page constructor |
| `computePageName` | Compute the page name (according to the page namespace) |
| `generateTree` | Generate overview markdown tree |
| `write` | Write markdown file |
| `writeMdClasses` |  |
| `writeSubPages` | Write sub pages of this page |
| `setDirectory` | Define the current page directory |
| `getPageBfe` | Return the page basename file with extension |
| `offsetExists` | Whether a offset exists |
| `offsetGet` | Offset to retrieve |
| `offsetSet` | Offset to set |
| `offsetUnset` | Offset to unset |

## Methods details

### `__construct`

__Page constructor__


#### Signature

```php
 public function __construct($pageNamespace, $chapters);
```

#### Parameters

| Name | Type | Description |
|---|---|---|
| `$pageNamespace` | string |  |
| `$chapters` | ClassMd[] |  |

#### Return



### `computePageName`

__Compute the page name (according to the page namespace)__


#### Signature

```php
 protected function computePageName();
```

#### Parameters

    No parameters

#### Return

    string 


### `generateTree`

__Generate overview markdown tree__


#### Signature

```php
 public function generateTree($pad, $relativePath);
```

#### Parameters

| Name | Type | Description |
|---|---|---|
| `$pad` | string |  |
| `$relativePath` | string |  |

#### Return

    string 


### `write`

__Write markdown file__


#### Signature

```php
 public function write();
```

#### Parameters

    No parameters

#### Return



### `writeMdClasses`

____


#### Signature

```php
 protected function writeMdClasses();
```

#### Parameters

    No parameters

#### Return



### `writeSubPages`

__Write sub pages of this page__


#### Signature

```php
 public function writeSubPages();
```

#### Parameters

    No parameters

#### Return



### `setDirectory`

__Define the current page directory__


#### Signature

```php
 public function setDirectory();
```

#### Parameters

| Name | Type | Description |
|---|---|---|
| `` | $string |  |

#### Return



### `getPageBfe`

__Return the page basename file with extension__


#### Signature

```php
 public function getPageBfe();
```

#### Parameters

    No parameters

#### Return

    string The page base name


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


