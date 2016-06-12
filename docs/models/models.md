# models

**Namespace**  : alphayax\mdGen\models

# Overview

- [Chapter](models.md#Chapter)
- [Page](models.md#Page)


<a name="Chapter"></a>
## Chapter

**Class**  : alphayax\mdGen\models\Chapter

### Public methods

| Method | Description |
|---|---|
| `getNextComponent` | Get the next namespace component (according the NS given) | 
| `getNamespace` | Get the namespace of the current reflected class | 
| `getReflexion` | Get the reflected class | 
| `generate` | Generate chapter markdown | 

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
