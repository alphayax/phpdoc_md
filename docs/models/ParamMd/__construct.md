**Namespace**  : [alphayax\mdGen\models](../__NAMESPACE__.md) -
**Class** : [ParamMd](__CLASS__.md)

## `ParamMd::__construct`

#### Description

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

> No Return

#### Implementation

```php
    public function __construct( \Zend_Reflection_Docblock_Tag_Param $param){
        $this->type         = $param->getType();
        $this->description  = $param->getDescription();
        $this->variableName = $param->getVariableName();

        if( empty( $this->variableName) && 0 === strpos( $this->type, '$')){
            $this->variableName = $this->type;
            $this->type         = 'unknown';
        }
    }

```
