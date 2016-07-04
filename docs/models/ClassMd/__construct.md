**Namespace**  : [alphayax\mdGen\models](../__NAMESPACE__.md) -
**Class** : [ClassMd](__CLASS__.md)

## `ClassMd::__construct`

#### Description

> ClassChapter constructor.

#### Signature

```php
 public function __construct($class);
```

#### Parameters

| Name | Type | Description |
|---|---|---|
| `$class` | string |  |

#### Return

> No Return

#### Implementation

```php
    public function __construct( $class){
        $this->class = $class;
        $this->reflexion = new \ReflectionClass( $class);
        $this->computeType();

        /// Properties
        $properties = $this->reflexion->getProperties();
        foreach ($properties as $property){
            $this->properties[] = $property->getName();
        }

        /// Methods
        $methods = $this->reflexion->getMethods();
        foreach ( $methods as $method){

            $methodMd = new MethodMd( $this->reflexion->getName(), $method->getName());
            $this->methods[] = $methodMd;

            /// Filter only public and non constructor methods
            if( ! $method->isPublic() || $method->isConstructor()){
                continue;
            }

            /// Filter only methods inside class (not derived)
            if( $method->getDeclaringClass()->getName() != $this->reflexion->getName()){
                continue;
            }

            $this->publicMethods[] = $methodMd;
        }

        /// Constants
        foreach ( $this->reflexion->getConstants() as $constantName => $constantValue){
            $this->constants[] = [
                'name'  => $constantName,
                'value' => $constantValue,
            ];
        }
    }

```
