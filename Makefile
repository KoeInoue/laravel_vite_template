up:
	docker compose up -d
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
php:
	docker container exec -it laravel-template_php bash
nginx:
	docker container exec -it laravel-template_nginx ash