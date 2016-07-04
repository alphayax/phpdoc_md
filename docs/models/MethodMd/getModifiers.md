**Namespace**  : [alphayax\mdGen\models](../__NAMESPACE__.md) -
**Class** : [MethodMd](__CLASS__.md)

## `MethodMd::getModifiers`

#### Description

> 

#### Signature

```php
 public function getModifiers();
```

#### Parameters

    No parameters

#### Return

    string 

#### Implementation

```php
    public function getModifiers() {
        return
            ($this->reflexion->isFinal()     ? ' final'      : '').
            ($this->reflexion->isAbstract()  ? ' abstract'   : '').
            ($this->reflexion->isPublic()    ? ' public'     : '').
            ($this->reflexion->isProtected() ? ' protected'  : '').
            ($this->reflexion->isPrivate()   ? ' private'    : '').
            ($this->reflexion->isStatic()    ? ' static'     : '');

    }

```
