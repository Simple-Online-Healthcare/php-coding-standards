<img width="100%" src="assets/readme-header.svg">

<h1 align="center">php-coding-standards</h1>

# Introduction

This package includes the SOH PHP Coding Standards rule-set for `PHP-CS-Fixer`. Our coding standards are based off of
the Symfony (and Symfony:risky) rule-sets.

This package is built with Laravel in mind however it is possible to provide
your own custom paths if required.

# Installation

1. Add the repository to your `composer.json`
    - `composer config repositories.simple-online-healthcare/php-coding-standards vcs https://github.com/Simple-Online-Healthcare/php-coding-standards`
2. Require the package within your application
    - `composer require simple-online-healthcare/php-coding-standards`
3. Create a `.php-cs-fixer.dist.php` file to enable the standards
    - ```php
        <?php
        
        declare(strict_types=1);
        
        use SimpleOnlineHealthcare\CodingStandards\CodingStandards;
        
        return CodingStandards::enable(__DIR__);
        ```
4. Run the standards
    - `./vendor/bin/php-cs-fixer fix --allow-risky=yes`

# Customisation

If you aren't using Laravel, or if you wish to fix other directories, you may pass in a `$paths` array as the second
parameter to `enable()`.

```php
<?php

declare(strict_types=1);

use SimpleOnlineHealthcare\CodingStandards\CodingStandards;

return CodingStandards::enable(__DIR__, [__DIR__ . '/src']);
```