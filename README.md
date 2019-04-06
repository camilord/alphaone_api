# AlphaOne API Library
 Use this library to integrate with AlphaOne Building Consent System

# Usage
```php
<?php

define('CONFIG_FILE', dirname(__DIR__).'/config.json');

$obj = new AlphaOneAPI(CONFIG_FILE);
$data = $obj->getProjectDetails(12);
print_r($data);

```

**Output**
```text
Array
(
    [ID] => 12
    [ConsentID] => BC12
    [Complexity] => R1
    [ComplexityOverride] => 
    [Stats] => Array
        (
          ...
        )
)
```

For the detailed documentation of the AlphaOne API, please contact AlphaOne support team or visit at www.abcs.co.nz