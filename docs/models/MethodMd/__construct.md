**Namespace**  : [alphayax\mdGen\models](../__NAMESPACE__.md) -
**Class** : [MethodMd](__CLASS__.md)

## `MethodMd::__construct`

#### Description

> MethodMd constructor.

#### Signature

```php
 public function __construct($className, $methodName);
```

#### Parameters

| Name | Type | Description |
|---|---|---|
| `$className` | unknown |  |
| `$methodName` | unknown |  |

#### Return


#### Implementation

```php
    public function __construct( $className, $methodName) {

        try {

            $this->reflexion = new \Zend_Reflection_Method( $className, $methodName);

            $this->name = $this->reflexion->getName();
            $docBlock = $this->reflexion->getDocblock();

            /// Implementation
            $this->impl = '';
            $f = fopen( $this->reflexion->getFileName(), 'r');
            $lineNo = 0;
            while ($line = fgets($f)) {
                $lineNo++;
                if ($lineNo >= $this->reflexion->getStartLine()) {
                    $this->impl .= $line;
                }
                if ($lineNo == $this->reflexion->getEndLine()) {
                    break;
                }
            }
            fclose($f);


            /// Desc
            $shortDesc = str_replace(PHP_EOL, ' ', $docBlock->getShortDescription());
            $this->description = str_replace(PHP_EOL, ' ', $shortDesc);

            /// Params
            /** @var \Zend_Reflection_Docblock_Tag_Param[] $params */
            $params = $docBlock->getTags( 'param');
            foreach ( $params as $param){
                $this->params[] = new ParamMd( $param);
            }

            /** @var \Zend_Reflection_Docblock_Tag_Return $return */
            $return = $docBlock->getTag( 'return');
            if( $return){
                $this->return = $return->getType() . ' ' . $return->getDescription();
            }



        } catch (\Exception $e) {
            // Unable to parse PHPDoc Block... Skip it :(
        }
    }

```
