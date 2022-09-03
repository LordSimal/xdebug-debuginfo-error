# Fatal error: __debuginfo() must return an array with object passed via method parameter

This Repository has the purpose to clarify how to reproduce the following error currently present inside the [CakePHP 5.x branch](https://github.com/cakephp/cakephp/tree/5.x) when running all tests with Xdebug enabled:

## How to reproduce:

1) Check out repository
2) Make sure to run PHP 8.1.x with Xdebug 3.1.5 enabled
3) `composer install` or `composer.phar install` if you dont have it installed globally
4) Run `vendor/bin/phpunit tests/XdebugTest.php`

## What is the problem?

Currently I get the following error when running a specific test in the CakePHP 5.x branch: [HERE](cakephp.log)

## Usefull information

For some reason it seems to matter if the object (which throws the exception inside the `__debugInfo()` method) happens to be
* directly inside a try-catch block (1 test) or 
* is passed down via another classes method argument (2 test).

The tests run through without any problem if xdebug is disabled.

But whenever you enable xdebug you always get the error mentioned in [test.log](test.log)

## System info

PHP Version Info:
```
PHP 8.1.10 (cli) (built: Sep  2 2022 17:09:09) (NTS)
Copyright (c) The PHP Group
Zend Engine v4.1.10, Copyright (c) Zend Technologies
    with Xdebug v3.1.5, Copyright (c) 2002-2022, by Derick Rethans
```

Operating System: MacOS 12.5.1

Xdebug Config:
```
xdebug.mode = develop,debug
xdebug.start_with_request = yes
xdebug.log_level = 0
```

