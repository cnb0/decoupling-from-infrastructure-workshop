#!/usr/bin/env bash

set -e

vendor/bin/phpstan analyse
vendor/bin/phpunit --verbose --testdox --testsuite unit
vendor/bin/behat --suite acceptance --tags="~@ignore" -vvv
