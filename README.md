## API CRUD + Tiny Client (Laravel 9 + Vue.js 3)

Very Beginning of the good project :) Simplicity of the interface on the outside and power on the inside.

### On Board:

- Laravel framework v9
- Vue.js v3 SPA with 'composables' pattern
- RESTful JSON API
- ORM and relationships/associations
- Request validation
- Resources, migrations, seeders, tests
- PSR-2 compliant source code

### What you need for running:
- Docker

### Installation instructions:
- Clone project
- Set up .env file (copy .env.example file)
- Run in project directory for installing composer dependencies including sail (**be sure that you copy command from original readme file**)

docker run --rm \
-u "$(id -u):$(id -g)" \
-v $(pwd):/var/www/html \
-w /var/www/html \
laravelsail/php81-composer:latest \
composer install --ignore-platform-reqs

- `sail up`
- `sail artisan key:generate`
- `sail artisan migrate`
- `sail artisan db:seed`
- `sail npm install`
- `sail npm run dev`
- `sail test`

### Enjoy!

