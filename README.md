# Book events

## Installation

Clone the repo locally:

```sh
git clone https://github.com/rbuzzibarrios/book-event.git
cd book-event
```

Install PHP dependencies:

```sh
composer install
```

Install NPM dependencies:

```sh
npm install
```
or
```sh
yarn install
```

Setup configuration:

```sh
cp .env.example .env
```

Generate application key:

```sh
php artisan key:generate
```

Create an MySQL database. You can also use another database (SQLite, Postgres), simply update your configuration accordingly.

Run database migrations and database seeder:

```sh
php artisan migrate:fresh --seed
```

Start the development server:

```sh
npm run dev
```
or
```sh
yarn dev
```

Run artisan server:

```sh
php artisan serve
```

## Running tests

To run the Booking Event tests

```sh
cp .env.example .env.testing
```

and run:
```
php artisan optimize --env=testing && php artisan migrate:fresh --seed && php artisan test
```
or to run parallel tests:

```
php artisan optimize --env=testing && php artisan migrate:fresh --seed && php artisan test -p
```