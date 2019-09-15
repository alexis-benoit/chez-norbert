# chez-norbert

# Installation

## Environment variables

Use `.env.local` instead of `.env` to set environment variables in development mode.

```
DATABASE_URL="mysql://db_user:db_password@127.0.0.1:3306/db_name"
```

## Initialize dependencies

```shell
# Create the database, skip if it already exists
php bin/console doctrine:database:create

# Apply migrations
php bin/console doctrine:migrations:migrate

# Load fixtures
php bin/console doctrine:fixtures:load

# Install composer dependencies
composer install

# Install node modules dependecies
npm install
```

## Starting server

```shell

# Starts Symfony development server
php bin/console server:run

# Starts webpack dev server
npm run dev-server

# or starts webpack file watcher
npm run watch
```

# Test

````shell
# Run test
php bin/phpunit
````

# Commit style

[See COMMIT.md](COMMIT.md)