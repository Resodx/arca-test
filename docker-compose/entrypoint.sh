#!/usr/bin/env sh

composer install --no-interaction --no-progress --prefer-dist

php bin/console doctrine:migrations:migrate --no-interaction

php bin/console doctrine:fixtures:load --no-interaction

php bin/console fos:elastica:populate

php bin/console cache:clear

php-fpm