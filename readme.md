## Laravel Passport Multi-auth  Example

### Local Development

Clone this repository and run the following commands:

```sh
cp .env.example .env
vim .env
composer self-update
composer install
composer update
php artisan key:generate
php artisan migrate
php artisan db:seed
php artisan passport:keys
```


## Deploying to Heroku

**1. Create a Heroku App**

Setup an app name

```sh
app_name=heroku-multiauth-demo
```

Create a heroku app

```sh
heroku apps:create $app_name
heroku addons:create heroku-postgresql:hobby-dev --app $app_name
```

**2. Add Heroku git remote**

```sh
heroku git:remote --app $app_name
```

**3. Set config parameters**

To operate correctly you need to set `APP_KEY`:

```sh
heroku config:set APP_KEY=$(php artisan --no-ansi key:generate --show)
heroku config:set APP_LOG=errorlog
```

Configure database connection

```sh
heroku config:set DB_CONNECTION=pg-heroku
```

Optionally set your app's environment

```sh
heroku config:set APP_ENV=production APP_DEBUG=false APP_LOG_LEVEL=debug
```

**4. Deploy to Heroku**

```sh
 git push heroku master
```


**5. Passport key for Heroku (Do once)**

```sh
heroku run bash
php artisan passport:keys
cat storage/oauth-public.key]
cat storage/oauth-private.key
```

Copy content ,exit bash. Wrap the .key in double quotes,  add it on the CLI config

```sh
heroku config:set OAUTH_PUBLIC_KEY="..."
heroku config:set OAUTH_PRIVATE_KEY="..."
git push heroku master
```

---

## License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
