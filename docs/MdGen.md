
# **Class** MdGen

Full name : `alphayax\mdGen\MdGen`

## Properties

- srcDirectory
- loadedClasses
- chapters
- rootPage

## Methods summary

| Method | Description |
|---|---|
| `__construct` | MdGen constructor. |
| `loadClasses` | Load class in the source directory |
| `filterNamespace` | Filter class who are in a specific namespace |
| `filterSubClasses` | Filter class who are sub-classes of a specific class |
| `generateClassMdFromLoadedClasses` | Create a chapter form loaded classes |
| `generate` | Generate markdown files |

## Methods details

### `__construct`

__MdGen constructor.__


#### Signature

```php
 public function __construct(, );
```

#### Parameters

| Name | Type | Description |
|---|---|---|
| `` | $srcDirectory |  |
| `` | $rootNamespace |  |

#### Return



### `loadClasses`

__Load class in the source directory__


#### Signature

```php
 protected function loadClasses();
```

#### Parameters

    No parameters

#### Return



### `filterNamespace`

__Filter class who are in a specific namespace__


#### Signature

```php
 public function filterNamespace($namespaceName);
```

#### Parameters

| Name | Type | Description |
|---|---|---|
| `$namespaceName` | string | Namespace Name to filter |

#### Return



### `filterSubClasses`

__Filter class who are sub-classes of a specific class__


#### Signature

```php
 public function filterSubClasses($className);
```

#### Parameters

| Name | Type | Description |
|---|---|---|
| `$className` | string | Super class name to filter |

#### Return



### `generateClassMdFromLoadedClasses`

__Create a chapter form loaded classes__


#### Signature

```php
 protected function generateClassMdFromLoadedClasses();
```

#### Parameters

    No parameters

#### Return

    ClassMd[] 


### `generate`

__Generate markdown files__


#### Signature

```php
 public function generate($directory);
```

#### Parameters

| Name | Type | Description |
|---|---|---|
| `$directory` | string | Path to generated files |

#### Return



