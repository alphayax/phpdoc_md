**Namespace**  : alphayax\mdGen\models  - **Class** : NamespaceMd

## `NamespaceMd::__construct`

#### Description

> Page constructor


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


#### Implementation

```php
    public function __construct( $pageNamespace, array $chapters) {
        $this->namespace = $pageNamespace;
        $this->pageName  = $this->computePageName();
        $this->page_bfe  = '__NAMESPACE__.md';

        $pagesBtComponents = [];
        foreach( $chapters as $chapter){

            if( $chapter->getNamespace() == $pageNamespace){
                $this->classMds[] = $chapter;
                continue;
            }

            $component = $chapter->getNextComponent( $pageNamespace);
            $pagesBtComponents[ $component][] = $chapter;
        }

        $subPages = array_keys( $pagesBtComponents);
        foreach( $subPages as $subPage){
            $this->subPages[$subPage] = new NamespaceMd( $pageNamespace . '\\'. $subPage, $pagesBtComponents[$subPage]);
        }
    }

```
