
# models

**Namespace**  : alphayax\mdGen\models

# Overview

- [Page](models.md#Page)
- [Chapter](models.md#Chapter)
- [Method](models.md#Method)


---
<a name="Page"></a>
## Page

**Class**  : alphayax\mdGen\models\Page

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

<a name="Chapter"></a>
## Chapter

**Class**  : alphayax\mdGen\models\Chapter

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

<a name="Method"></a>
## Method

**Class**  : alphayax\mdGen\models\Method

### Public methods

| Method | Description |
|---|---|
| `offsetExists` | Whether a offset exists |
| `offsetGet` | Offset to retrieve |
| `offsetSet` | Offset to set |
| `offsetUnset` | Offset to unset |

