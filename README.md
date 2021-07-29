# Mego - Shoe Store Website API
## Introduction:
This is an API of shoe store website - Mego made by Laravel 8. This included functions:
- Login/Logout
- Google authorization
- Role/permission (admin, customer)
- Customer management
- Product management
- Product categories management
- Order management
- Banner management

## Environments:
composer 2.0.8
<br/>
setup: https://getcomposer.org/download/
<br/>
test: `composer -v`

php 7.4.13
<br/>
setup: https://www.cloudbooklet.com/install-php-7-4-on-ubuntu/
<br/>
test: `php -v`

postgres 12.5
<br/>
setup: `sudo apt install postgresql postgresql-contrib`
<br/>
test: `psql --version`

## Guideline:
#### Clone github: https://github.com/kulcua/mego-backend.git

#### Setup packages by composer: 
    composer install
    composer dump-autoload

#### Setup database:
- Change a code in config/database.php line 73:
        from `'database' => ltrim($DATABASE_URL['path'],'/'),`
        to `'database' => env('DB_DATABASE', 'shoesstore'),`
- Start PostgreSQL on localhost:
    `sudo service postgresql start`
- Migrate database on localhost:
    `php artisan migrate:fresh --seed`
    After succeeded, use pgAdmin to manage database.
- Connect with pgAdmin:
```sh
PORT: 127.0.0.1
DB_NAME: shoesstore
DB_USER: kulcua
DB_PASSWORD: kul123
```

#### Run on localhost:8000: 
`php artisan serve`
#### Document API:
- Open Swagger Editor: https://editor.swagger.io/
- Copy all from: https://raw.githubusercontent.com/kulcua/mego-backend/main/api/openapi.yaml and paste to Swagger Editor.
