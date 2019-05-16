<a href="https://www.twilio.com">
  <img src="https://static0.twilio.com/marketing/bundles/marketing/img/logos/wordmark-red.svg" alt="Twilio" width="250" />
</a>

This application example demonstrates how to do simple phone verification with Laravel PHP Framework, and Twilio Verify.

## Local Development

1. Clone the project and cd into it.
```bash
git clone ...
cd verify-v2-quickstart-php/
```

1. Copy `.env.example` to `.env` to setup you environment.
```bash
cp .env.example .env
```

1. Set your application key to a random string.

```bash
php artisan key:generate
```

1. Edit `.env` to add your Twilio access keys.

```
TWILIO_ACCOUNT_SID=ACXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
TWILIO_AUTH_TOKEN=7axxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
TWILIO_VERIFICATION_SID=VAXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
```

1. Run migrations to create the database.

```bash
touch ./twilio_verify_quickstart.sqlite
php artisan migrate
```

1. Run the application.

```bach
php artisan serve
```

1. Check it out at [http://localhost:8000](http://localhost:8000)


That's it!

## Run the tests

1. Run phpunit

```bash
phpunit
```

## Meta

* No warranty expressed or implied. Software is as is. Diggity.
* [MIT License](http://www.opensource.org/licenses/mit-license.html)
* Lovingly crafted by Twilio Developer Education.
