
install: vendor/autoload.php .env public/storage
	php artisan cache:clear
	php	artisan	migrate

.env:
	cp .env.example .env
	php artisan key:generate

public/storage:
	php artisan storage:link

vendor/autoload.php: composer.lock
	composer install
	touch vendor/autoload.php

.PHONY: prepare
prepare:
	php artisan migrate:fresh --seed

.PHONY: seed-all
seed-all:
	php artisan db:seed

.PHONY: helpers
helpers:
	php artisan ide-helper:generate
	php artisan ide-helper:models -M
	php artisan ide-helper:meta