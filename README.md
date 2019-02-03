[![Build Status](https://travis-ci.org/phpshko/directions-example.svg?branch=master)](https://travis-ci.org/phpshko/directions-example)

Solution for ["All Different Directions"](https://open.kattis.com/problems/alldifferentdirections)

Installation
------------

```bash
#In docker
./app composer install

#Or in host
composer install
```

Tests
------------

```bash
#In docker
./app tests

#Or in host
./vendor/bin/phpunit
```

Usage
------------

```bash
#In docker
./app run ./samples/1.txt
./app run ./samples/2.txt

#Or in host
php demo.php ./samples/1.txt
php demo.php ./samples/2.txt
```
