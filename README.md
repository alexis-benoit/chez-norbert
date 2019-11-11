# chez-norbert

# Installation

## Environment variables

Use `.env.local` instead of `.env` to set environment variables in development mode.

```dotenv
DATABASE_URL="mysql://db_user:db_password@127.0.0.1:3306/db_name"
MAILER_URL=smtp://localhost:1025

#Keys for dev env
GOOGLE_RECAPTCHA_SITE_KEY=6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI
GOOGLE_RECAPTCHA_SECRET=6LeIxAcTAAAAAGG-vFI1TnRWxMZNFuojJ4WifJWe
```

## Initialize dependencies

```shell script
# Install composer dependencies
composer install

# Install node modules dependecies
npm install

# Create the database, skip if it already exists
php bin/console doctrine:database:create

# Apply migrations
php bin/console doctrine:migrations:migrate

# Load fixtures
php bin/console doctrine:fixtures:load
```

## Mail

To work with mail you can install maildev 

```shell script
npm i -g maildev
```

## Starting server

```shell script

# Starts Symfony development server
php bin/console server:run

# Starts webpack dev server
npm run dev-server

# or starts webpack file watcher
npm run watch

# Starts maildev server
maildev
```

# Test

````shell script
# Create env.test.local
DATABASE_URL="mysql://root@127.0.0.1:3306/db_name_test"

# Create the testing database, skip if it already exists
php bin/console doctrine:database:create --env test

# Apply migrations
php bin/console doctrine:migrations:migrate --env test

# Run test
php bin/phpunit
````

# Commit style

[See COMMIT.md](COMMIT.md)