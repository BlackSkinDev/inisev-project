
# Inisev App This app allows ;
> An 'admin' to create a post for website
> Allows users to subscribe to a website
> Notifies users subscribed to a website when a new post is created for such website

## Description
This project was built startLaravel and MYSQL .


## Running the App
To run the App, you must have:
- **PHP** (https://www.php.net/downloads)

Clone the repository to your local machine using the command
```console
$ git clone *remote repository url*
```

Create an `.env` file using the command. You can use this config or change it for your purposes.

```console
$ cp .env.example .env
```


### Environment
Configure environment variables in `.env` for dev environment based on your MYSQL database configuration
Mailtrap was used for sending emails, Ensure to enter your mailtrap configuration in the env (especially username and password)

```  
DB_CONNECTION=<YOUR_MYSQL_TYPE>
DB_HOST=<YOUR_MYSQL_HOST>
DB_PORT=<YOUR_MYSQL_PORT>
DB_DATABASE=<YOUR_DB_NAME>
DB_USERNAME=<YOUR_DB_USERNAME>
DB_PASSWORD=<YOUR_DB_PASSWORD>


MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=
MAIL_PASSWORD=
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=hello@inisev.com
MAIL_FROM_NAME="${APP_NAME}"

```

### LARAVEL INSTALLATION
Install the dependencies and start the server

```console
$ composer install
$ php artisan key:generate
$ php artisan inisev-onboarding:seed   - This command run necessary migrations and also seeds database and perform other important operations
$ php artisan serve - If you use valet just hit (http://app.test/api i.e your valet link) or  http://localhost:8000 
```


You should be able to visit your app at your laravel app base url e.g  http://localhost:8000  or http://app.test (Provided you use Laravel Valet).


## additional notes
- Database was used as queue driver. When app is setup, Ensure to run "php artisan queue:work" in seperate terminal of your project to make sure your queue workers runs in background
-Postman Doc - 
