# Установка и настройка проекта

Скопировать `.env` файл из `.env.example` и указать настройки

```
cp .env.example .env
```

### Docker

Запустить команду

```
docker network create web
docker-compose up -d --build
```

### Laravel

Заходим внутрь докера, там APP
Либо команда
```
docker-compose exec app bash
```
И запускаем следующие команды

```
composer install
php artisan key:generate
php artisan migrate
php artisan queue:restart
```


# Полезные ссылки

Первичная настройка Ubuntu
https://www.digitalocean.com/community/tutorials/initial-server-setup-with-ubuntu-18-04

Установка Docker в Ubuntu
https://www.digitalocean.com/community/tutorials/how-to-install-and-use-docker-on-ubuntu-18-04

Установка Git в Ubuntu
https://www.digitalocean.com/community/tutorials/how-to-install-git-on-ubuntu-18-04

Установка php, nginx, mysql в Docker
https://www.digitalocean.com/community/tutorials/how-to-set-up-laravel-nginx-and-mysql-with-docker-compose-ru

Установка Cron в Ubuntu
https://www.digitalocean.com/community/tutorials/how-to-use-cron-to-automate-tasks-ubuntu-1804
