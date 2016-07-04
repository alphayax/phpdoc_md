**Namespace**  : [alphayax\mdGen\models](../__NAMESPACE__.md) -
**Class** : [NamespaceMd](__CLASS__.md)

## `NamespaceMd::computePageName`

#### Description

> Compute the page name (according to the page namespace)

#### Signature

```php
 protected function computePageName();
```

#### Parameters

    No parameters

#### Return

    string 

#### Implementation

```php
    protected function computePageName(){
        $namespaceComponents = explode( '\\', $this->namespace);
        return array_pop( $namespaceComponents);
    }

```
