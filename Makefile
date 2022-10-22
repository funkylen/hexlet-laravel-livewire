serve:
	php artisan serve

migrate:
	php artisan migrate

install:
	cp .env.example .env
	touch database.sqlite
	composer install
	php artisan key:generate
	make migrate
