**Namespace**  : [alphayax\mdGen](../__NAMESPACE__.md) -
**Class** : [MdGen](__CLASS__.md)

## `MdGen::loadClasses`

#### Description

> Load class in the source directory

#### Signature

```php
 protected function loadClasses();
```

#### Parameters

> No parameters

#### Return

> No Return

#### Implementation

```php
    protected function loadClasses(){
        if( ! is_dir( $this->srcDirectory)){
            throw new \Exception( 'Source directory not found : '. $this->srcDirectory);
        }

        /// Recursively scan PHP Files
        $objects = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator( $this->srcDirectory), \RecursiveIteratorIterator::SELF_FIRST);
        $Regex = new \RegexIterator( $objects, '/^.+\.php$/i', \RecursiveRegexIterator::GET_MATCH);
        foreach( $Regex as $name => $object){
            if ( ! empty( $name)) {
                require_once $name;
            }
        }

        /// Extract data from loaded classes
        $classes    = get_declared_classes();
        $traits     = get_declared_traits();
        $interfaces = get_declared_interfaces();
        $this->loadedClasses = array_merge( $classes, $traits, $interfaces);
    }

```
