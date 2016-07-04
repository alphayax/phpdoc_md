
# generateTree

**Class** : NamespaceMd
**Namespace**  : alphayax\mdGen\models


> Generate overview markdown tree


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

## Implementation

```php
    public function generateTree( $pad = '', $relativePath = '') {
        $generatedMd = '';

        /// SubPages
        if( ! empty( $this->subPages)){
            foreach( $this->subPages as $subPageName => $subPage){
                $subPageFile  = './' . $relativePath . $subPageName . DIRECTORY_SEPARATOR . $subPage->getPageBfe();
                $generatedMd .=  "$pad- [$subPageName]($subPageFile)". PHP_EOL;
                $generatedMd .= $subPage->generateTree( $pad . '    ', $relativePath . $subPageName . DIRECTORY_SEPARATOR);
            }
        }

        /// Chapters
        if( ! empty( $this->classMds)){
            foreach($this->classMds as $chapter){
                $chapterName   = $chapter->getReflexion()->getShortName();
                $chapterFile   = $relativePath . $this->getPageBfe();
                $chapterAnchor = $chapterFile .'#'. $chapter->getReflexion()->getShortName();
                $generatedMd  .= "$pad- [$chapterName]($chapterAnchor)" . PHP_EOL;
            }
        }

        return $generatedMd;
    }

```
