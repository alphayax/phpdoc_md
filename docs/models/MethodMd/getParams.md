
# getParams

**Namespace**  : alphayax\mdGen\models

**Class** : MethodMd


> 


#### Signature

```php
 public function getParams();
```

#### Parameters

    No parameters

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
