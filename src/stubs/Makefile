.PHONY: build ci composer image tag up xdebug

IMAGE ?= jasonmccallister
TAG ?= local

build:
	docker build -t $(IMAGE):$(TAG) .
composer:
	docker run --interactive --tty \
	--volume $(PWD):/app \
	--volume $(SSH_AUTH_SOCK):/ssh-auth.sock \
	--volume /etc/passwd:/etc/passwd:ro \
	--volume ~/.ssh:/root/.ssh:ro \
	--volume /etc/group:/etc/group:ro --user $(id -u):$(id -g) \
	--env SSH_AUTH_SOCK=/ssh-auth.sock \
	composer install --ignore-platform-reqs --no-interaction --no-plugins --prefer-dist
down:
	docker-compose down
logs:
	docker-compose logs -f
migrate:
	docker-compose exec app php artisan migrate
migrate-fresh:
	docker-compose exec app php artisan migrate:fresh
phpunit:
	docker-compose exec app ./vendor/bin/phpunit
reports:
	docker-compose exec app ./vendor/bin/phpunit --coverage-html reports
seed:
	docker-compose exec app php artisan db:seed
tag:
	docker tag "$(IMAGE):$(TAG)" "$(IMAGE):$(TAG)"
testdox:
	docker-compose exec app ./vendor/bin/phpunit --testdox
up:
	docker-compose up -d
xdebug:
	docker-compose exec app /usr/local/bin/docker-php-source extract
	docker-compose exec app pecl install xdebug
	docker-compose exec app /usr/local/bin/docker-php-ext-enable xdebug
	docker-compose exec app /usr/local/bin/docker-php-source delete
	docker-compose stop
	docker-compose up -d
