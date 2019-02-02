#!/usr/bin/env bash

DOCKER_PHP="docker run --rm -v $(pwd):/app -w /app php:cli"
DOCKER_COMPOSER="docker run --rm -v $(pwd):/app -w /app composer"

if [ $# -gt 0 ];then
    if [ "$1" == "run" ]; then
        shift 1
        $DOCKER php ./demo.php "$@"

    elif [ "$1" == "composer" ]; then
        shift 1
        $DOCKER_COMPOSER composer "$@"

    elif [ "$1" == "phpcs" ]; then
        shift 1
        $DOCKER php ./vendor/bin/phpcs "$@"

    elif [ "$1" == "tests" ]; then
        shift 1
        $DOCKER php ./vendor/bin/phpunit "$@"
    fi
fi