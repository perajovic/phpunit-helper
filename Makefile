.PHONY: build

composer-install:
	composer install

composer-update:
	composer update

cs:
	vendor/bin/php-cs-fixer fix --verbose --allow-risky=yes
