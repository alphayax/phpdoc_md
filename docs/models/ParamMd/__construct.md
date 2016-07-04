
# __construct

**Namespace**  : alphayax\mdGen\models

**Class** : ParamMd


> ParamMd constructor.


#### Signature

```php
 public function __construct($param);
```

#### Parameters

| Name | Type | Description |
|---|---|---|
| `$param` | \Zend_Reflection_Docblock_Tag_Param |  |

#### Return


#### Implementation

```php
    public function __construct( \Zend_Reflection_Docblock_Tag_Param $param){
        $this->type         = $param->getType();
        $this->description  = $param->getDescription();
        $this->variableName = $param->getVariableName();
    }

```
