**Namespace**  : alphayax\mdGen\models  - **Class** : MethodMd

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
