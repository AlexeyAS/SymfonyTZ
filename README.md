# SymfonyTZ

## Install
1) Rename *docker-compose.yaml.example* to *docker-compose.yaml* and Edit
2) Rename *symfony/.env.example* to *symfony/.env*
3) Generate *APP_SECRET* and add to *symfony/.env*
4) `docker-compose up -d --build`
5) `cd symfony`
6) `composer install`
7) `php bin/console doctrine:database:create`
## About
- TZ
- Если возникает 500 из-за проблем к подключению к БД через докер при выполнении команд, поменять (указан в комментарии) в .env файле
*DATABASE_URL=mysql://root:root@db:3306/symfony_db?serverVersion=8.0* на
*DATABASE_URL=mysql://root:root@127.0.0.1:3306/symfony_db?serverVersion=8.0*
