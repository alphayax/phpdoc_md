
# models

**Namespace**  : alphayax\mdGen\models

# Overview

- [NamespaceMd](__NAMESPACE__.md#NamespaceMd)
- [ClassMd](__NAMESPACE__.md#ClassMd)
- [MethodMd](__NAMESPACE__.md#MethodMd)
- [ParamMd](__NAMESPACE__.md#ParamMd)

---

<a name="NamespaceMd"></a>
## NamespaceMd

**Class**  : alphayax\mdGen\models\NamespaceMd

### Public methods

| Method | Description |
|---|---|
| `generateTree` | Generate overview markdown tree |
| `write` | Write markdown file |
| `writeSubPages` | Write sub pages of this page |
| `setDirectory` | Define the current page directory |
| `getPageBfe` | Return the page basename file with extension |
| `offsetExists` | Whether a offset exists |
| `offsetGet` | Offset to retrieve |
| `offsetSet` | Offset to set |
| `offsetUnset` | Offset to unset |

<a name="ClassMd"></a>
## ClassMd

**Class**  : alphayax\mdGen\models\ClassMd

### Public methods

| Method | Description |
|---|---|
| `getNextComponent` | Get the next namespace component (according the NS given) |
| `getNamespace` | Get the namespace of the current reflected class |
| `getReflexion` | Get the reflected class |
| `getType` | Return the real kind of class (Trait, Interface, Class) |
| `offsetExists` | Whether a offset exists |
| `offsetGet` | Offset to retrieve |
| `offsetSet` | Offset to set |
| `offsetUnset` | Offset to unset |

<a name="MethodMd"></a>
## MethodMd

**Class**  : alphayax\mdGen\models\MethodMd

### Public methods

| Method | Description |
|---|---|
| `hasParams` |  |
| `getParams` |  |
| `getModifiers` |  |
| `offsetExists` | Whether a offset exists |
| `offsetGet` | Offset to retrieve |
| `offsetSet` | Offset to set |
| `offsetUnset` | Offset to unset |

<a name="ParamMd"></a>
## ParamMd

**Class**  : alphayax\mdGen\models\ParamMd

### Public methods

| Method | Description |
|---|---|
| `offsetExists` | Whether a offset exists |
| `offsetGet` | Offset to retrieve |
| `offsetSet` | Offset to set |
| `offsetUnset` | Offset to unset |

