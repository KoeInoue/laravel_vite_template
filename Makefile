up:
	docker compose up -d
up-build:
	docker compose up -d --build
build:
	docker compose build --no-cache --force-rm
stop:
	docker compose stop
down:
	docker compose down --remove-orphans
restart:
	@make down
	@make up
logs:
	docker compose logs
ps:
	docker compose ps
php:
	docker container exec -it php_laravel_template bash
nginx:
	docker container exec -it nginx_laravel_template ash
npm-i:
	docker container exec -it php_laravel_template npm install 
npm-dev:
	docker container exec -it php_laravel_template npm run dev
composer-i:
	docker contaienr exec -it php_laravel_template composer install
