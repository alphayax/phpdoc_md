**Namespace**  : [alphayax\mdGen\models](../__NAMESPACE__.md) -
**Class** : [MethodMd](__CLASS__.md)

## `MethodMd::hasParams`

#### Description

> 

#### Signature

```php
 public function hasParams();
```

#### Parameters

    No parameters

#### Return

    bool 

#### Implementation

```php
    public function hasParams() {
        return ! empty( $this->params);
    }

```
