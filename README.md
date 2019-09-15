# chez-norbert

# Installation

```shell

# Install composer dependencies
composer install

# Install node modules dependecies
npm install
```

## Environment variables

Use `.env.local` instead of `.env` to set environment variables in development mode.

## Starting server

```shell

# Starts Symfony development server
php bin/console server:run

# Starts webpack dev server
npm run dev-server

# or starts webpack file watcher
npm run watch
```

# Database
Configure .env.local and adjust the following line
```
DATABASE_URL="mysql://db_user:db_password@127.0.0.1:3306/db_name"
```

To create the database and tables
```
php bin/console doctrine:database:create
php bin/console make:migration
php bin/console doctrine:migrations:migrate
```

To set default values in the database
```
php bin/console doctrine:fixtures:load
```