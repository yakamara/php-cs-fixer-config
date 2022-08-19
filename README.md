# php-cs-fixer config for Yakamara projects

### Installation

```
composer require --dev yakamara/php-cs-fixer-config
```

Example `.php-cs-fixer.dist.php`:

```php
<?php

$finder = (new PhpCsFixer\Finder())
    ->in(__DIR__)
;

return Yakamara\PhpCsFixerConfig\Config::php81()
    ->setFinder($finder)
;

```
