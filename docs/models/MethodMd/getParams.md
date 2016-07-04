**Namespace**  : [alphayax\mdGen\models](../__NAMESPACE__.md) -
**Class** : [MethodMd](__CLASS__.md)

## `MethodMd::getParams`

#### Description

> 

#### Signature

```php
 public function getParams();
```

#### Parameters

> No parameters

#### Return

    string 

#### Implementation

```php
    public function getParams(){
        $variablesNames = [];
        foreach( $this->params as $param){
            $variablesNames[] = $param['variableName'];
        }
        return implode(', ', $variablesNames);
    }

```
