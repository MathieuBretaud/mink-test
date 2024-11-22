
install: vendor/autoload.php .env public/storage public/build/manifest.json
	php	artisan	migrate
	php artisan cache:clear

.env:
	cp .env.example .env
	php artisan key:generate

public/storage:
	php artisan storage:link

vendor/autoload.php: composer.lock
	composer install
	touch vendor/autoload.php

public/build/manifest.json: package.json
	npm i
	npm run build

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
