2022-06-03

- Added better Github workflow run-tests.yml got one from Laravel Paddle, now called tests.yml
- Added Unit .placeholder
- PHPUnit tests failing, wrong version of PHP maybe? Getting ErrorException: Method ReflectionParameter::isArray() is deprecated


2022-06-02

Issues

- Github Workflows: Cannot read config file ".php_cs.dist.php". Copied that across
- Did DI test, and got; A facade root has not been set

Change Log

- After publish, lots of phpunit test issues, so renamed in autoload-dev in composer

Notes:

1. It would be better to rename all "Payfast" to "CodeTemplate"
2. composer update not possible in this template due to patterns

- Moved WHMCS to Payfast and did some cleaning up and stripping down

2021-12-04

- Removed Pest
- Added autoload and autoload-dev section in `composer.json`

Sample configure.php some caveats:

fintechsystems not hypenated

```
php configure.php 
Author name (Eugene): Eugene van der Merwe
Author email (eugenevdm@gmail.com): 
Author username (fintech-systems): 
Vendor name (fintech-systems): FintechSystems
Vendor namespace (FintechSystems): 
Package name (laravel-payfast): 
Class name (LaravelPayfast): PayFast
Package description (This is my package laravel-payfast): 
------
Author     : Eugene van der Merwe (fintech-systems, eugenevdm@gmail.com)
Vendor     : FintechSystems (fintechsystems)
Package    : laravel-payfast <This is my package laravel-payfast>
Namespace  : FintechSystems\PayFast
Class name : PayFast
------
```
