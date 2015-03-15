subalcatel
==========

Web site for Subalcatel associative diving club

Using [laravel] (http://laravel.com/) php framework, [angularjs] (https://angularjs.org/) javascript framework, and [twitter bootstrap] (http://getbootstrap.com/) css framework.

## Features

* Licensee
* Adhesion
* Diving licences
* Medical certificate
* User rights and permissions
* Articles and comments
* Booking diving
* Public / Private and Admin section

## Issues / Requests
To report issues : https://github.com/lu6fer/subalcatel/issues
To add a request : https://github.com/lu6fer/subalcatel/pulls

## Requirements

	PHP >=5.4.0
	PHP McCrypt extension
	[composer] (https://getcomposer.org/)

## How to install
### Step 1: Get the code
#### Option 1: Git clone

	git clone https://github.com/lu6fer/subalcatel.git
	
#### Option 2: Download master zip file

	https://github.com/lu6fer/subalcatel/archive/master.zip
	
### Step 2: Get composer
#### Install composer
Refer to the composer website for instructions : https://getcomposer.org/download/
#### Update laravel dependencies

	cd subalcatel
	composer install --dev

### Step 3: Configure Laravel
#### Environments
From the subalcatel directory, go to ***bootstrap/start.php*** and edit to fit your needs
```php
/*
|--------------------------------------------------------------------------
| Detect The Application Environment
|--------------------------------------------------------------------------
|
| Laravel takes a dead simple approach to your application environments
| so you can just specify a machine name for the host that matches a
| given environment, then we will automatically detect it for you.
|
*/

$env = $app->detectEnvironment(array(

	'local' => array('local-machine-name'),
));
```
Now in ***app/config*** create directory according to the environment below 
 * app/config/local

Copy app/config/app.php inside the app/config/local directory.
You can now edit it and remove all the default configuration :
```php
<?php

return array(

	/*
	|--------------------------------------------------------------------------
	| Application Debug Mode
	|--------------------------------------------------------------------------
	|
	| When your application is in debug mode, detailed error messages with
	| stack traces will be shown on every error that occurs within your
	| application. If disabled, a simple generic error page is shown.
	|
	*/

	'debug' => true,

	/*
	|--------------------------------------------------------------------------
	| Application URL
	|--------------------------------------------------------------------------
	|
	| This URL is used by the console to properly generate URLs when using
	| the Artisan command line tool. You should set this to the root of
	| your application so that it is used when running Artisan tasks.
	|
	*/

	'url' => 'http://yourserver.local',

	/*
	|--------------------------------------------------------------------------
	| Encryption Key
	|--------------------------------------------------------------------------
	|
	| This key is used by the Illuminate encrypter service and should be set
	| to a random, 32 character string, otherwise these encrypted strings
	| will not be safe. Please do this before deploying an application!
	|
	*/

	'key' => 'YourSecretKey',

	/*
	|--------------------------------------------------------------------------
	| Autoloaded Service Providers
	|--------------------------------------------------------------------------
	|
	| The service providers listed here will be automatically loaded on the
	| request to your application. Feel free to add your own services to
	| this array to grant expanded functionality to your applications.
	|
	*/

	'providers' => array(

		
		'Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider',
		'Way\Generators\GeneratorsServiceProvider',

	),
);
```
#### Database
Copy the file ***app.config/database.php*** in ***app/config/local*** and edit to match your database type, username, password and schema. You can remove all unneeded configurations. Like this : 
```php
<?php

return array(

  'log' => true,
  'connections' => array(

    'mysql' => array(
      'driver'    => 'mysql',
      'host'      => 'localhost',
      'database'  => 'subalcatel',
      'username'  => 'subalcatel',
      'password'  => 'subalcatel',
      'charset'   => 'utf8',
      'collation' => 'utf8_unicode_ci',
      'prefix'    => '',
    ),
  ),
);
```

#### Mailer
As below, copy the ***app/config/mail.php*** into ***app/config/local*** and edit it with your settings.

#### Encryption key
You need to generate an encryption key for laravel.
You can use `artisan` to do that.
```
php artisan key:generate --env=local
```

### Step 4: Create schema and populate
Use `artisan` to create the schema : 
```
php artisant migrate
```
Now we can add data to the tables : 

```
php artisan db:seed
```

## Start the app 
Use the public directory as your server documentRoot.
Then you can use `admin@admin.com` / `admin!` to login.
