
# generateClassMdFromLoadedClasses

**Class** : MdGen
**Namespace**  : alphayax\mdGen


> Create a chapter form loaded classes


#### Signature

```php
 protected function generateClassMdFromLoadedClasses();
```

#### Parameters

    No parameters

#### Return

    ClassMd[] 

## Implementation

```php
    protected function generateClassMdFromLoadedClasses(){
        $classMds = [];
        foreach( $this->loadedClasses as $class){
            $classMds[] = new ClassMd( $class);
        }
        return $classMds;
    }

```
