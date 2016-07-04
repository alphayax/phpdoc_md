
# generate

**Class** : MdGen
**Namespace**  : alphayax\mdGen


> Generate markdown files


#### Signature

```php
 public function generate($directory);
```

#### Parameters

| Name | Type | Description |
|---|---|---|
| `$directory` | string | Path to generated files |

#### Return


## Implementation

```php
    public function generate( $directory = '.'){
        $chapters = $this->generateClassMdFromLoadedClasses();
        $this->rootPage = new models\NamespaceMd( $this->rootNamespace, $chapters);
        $this->rootPage->setDirectory( $directory);
        $this->rootPage->write();
    }

```
