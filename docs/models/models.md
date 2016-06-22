# models

**Namespace**  : alphayax\mdGen\models

# Overview

- [Page](models.md#Page)
- [Chapter](models.md#Chapter)


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
