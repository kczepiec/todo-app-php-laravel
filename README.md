<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
</p>

## Simple ToDo application

## Instalation

1. Clone repo using Git

git clone https://github.com/kczepiec/todo-app.git

2. Make copy of .env.example to .env and insert your database info

DB_CONNECTION=mysql
DB_HOST=example.com
DB_PORT=3306
DB_DATABASE=example_database
DB_USERNAME=example_user
DB_PASSWORD=example_password

3. Run Comoposer installation

composer install

4. Serve your appliaction

php artisan server

5. Migrate database and seed data

php artisan migrate --seed

enjoy!
