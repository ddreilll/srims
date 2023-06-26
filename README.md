# Introduction

Welcome to the **SRIMS - Student Records Informatiom Management System repository**.

This boilerplate provides a strong foundation for your Laravel 9 project with essential features such as a premade user management system, two-factor authentication login, user alerts, audit logs, and an API ready structure. This boilerplate is built with security and functionality in mind, giving you the freedom to focus on building your application's unique features. Use our boilerplate as a starting point to accelerate your project's development time and streamline your workflow. Happy coding!

# System Requirements

* Laravel 10.0&#x20;
* PHP 8.1 or higher
  * With the following extension:
    * Ctype PHP Extension
    * cURL PHP Extension
    * DOM PHP Extension
    * Fileinfo PHP Extension
    * Filter PHP Extension
    * Hash PHP Extension
    * Mbstring PHP Extension
    * OpenSSL PHP Extension
    * PCRE PHP Extension
    * PDO PHP Extension
    * Session PHP Extension
    * Tokenizer PHP Extension
    * XML PHP Extension
* MySQL **** 8.0.22 or higher
* Composer

### **Server Configuration**

_**Nginx**_

If you are deploying your application to a server that is running Nginx, you may use the following configuration file as a starting point for configuring your web server. Most likely, this file will need to be customized depending on your server's configuration.

Please ensure, like the configuration below, your web server directs all requests to your application's `public/index.php` file. You should never attempt to move the `index.php` file to your project's root, as serving the application from the project root will expose many sensitive configuration files to the public Internet:

```nginx
server {
    listen 80;
    listen [::]:80;
    server_name example.com;
    root /srv/example.com/public;
 
    add_header X-Frame-Options "SAMEORIGIN";
    add_header X-Content-Type-Options "nosniff";
 
    index index.php;
 
    charset utf-8;
 
    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }
 
    location = /favicon.ico { access_log off; log_not_found off; }
    location = /robots.txt  { access_log off; log_not_found off; }
 
    error_page 404 /index.php;
 
    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.0-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }
 
    location ~ /\.(?!well-known).* {
        deny all;
    }
}
```
# Code Architecture

The application is built using the **Model-View-Controller (MVC)** architectural pattern, which separates the application logic into three main components:

* **Models** handle the data and database operations.
* **Views** handle the presentation of data to the user.
* **Controllers** handle user input and interactions.


### Directory Structure

The main directories in the SRIMS directory structure are:

* `app`: This directory contains the core code of the application, including controllers, models, and views.
* `bootstrap` : This directory contains the `app.php` file which bootstraps the framework. This directory also houses a `cache` directory which contains framework generated files for performance optimization such as the route and services cache files. You should not typically need to modify any files within this directory.
* `config`: This directory contains the configuration files for the application.
* `database`: This directory contains the database migration and seed files.
* `public`: This directory contains the publicly accessible files, such as images and JavaScript files.
* `resources`: This directory contains the application's views and other resource files, such as language files.
* `routes`: This directory contains the application's route files.
* `storage`: This directory contains the application's file storage.
* `tests`: This directory contains the application's test files.
* `vendor`: This directory contains the application's dependencies, managed by Composer.

For more details see: https://laravel.com/docs/10.x/structure#introduction


# Database Design

The application uses a `MySQL database`. The database design can be found in the `database/migrations` directory in the application's source code.

Or, run the PHP Artisan command to inspect the Database Information

```
php artisan db:table
```

<p align="center"><img src="/public/docs/database/db_schema-06-18-2023.png" alt="Database Schema"></p>

# Third-Party Libraries

The application makes use of the following third-party libraries:

* [laraveldaily/laravel-charts : ^0.1.29](https://github.com/LaravelDaily/laravel-charts) Package to generate Chart.js charts directly from Laravel/Blade, without interacting with JavaScript.
* [nuovo/spreadsheet-reader : ^0.5.11](https://github.com/nuovo/spreadsheet-reader) is a PHP spreadsheet reader that differs from others in that the main goal for it was efficient data extraction that could handle large (as in really large) files.
* [yajra/laravel-datatables-oracle : ^10.3](https://github.com/yajra/laravel-datatables) for handling [server-side](https://www.datatables.net/manual/server-side) works of [DataTables](http://datatables.net/) jQuery Plugin via [AJAX option](https://datatables.net/reference/option/ajax) by using Eloquent ORM, Fluent Query Builder or Collection.
* [fakerphp/faker : ^1.9.1](https://github.com/fakerphp/faker) is a PHP library that generates fake data for you. Whether you need to bootstrap your database, create good-looking XML documents, fill-in your persistence to stress test it, or anonymize data taken from a production service, Faker is for you.
* [spatie/laravel-activitylog : ^4.6](https://github.com/spatie/laravel-activitylog) provides easy to use functions to log the activities of the users of your app.


The application makes use of the [Eloquent ORM](https://laravel.com/docs/9.x/eloquent) for database operations, which allows us to interact with the database using an object-oriented syntax. It also use the [Blade templating engine](https://laravel.com/docs/9.x/blade#main-content) for views, which provides a simple and lightweight way to create reusable templates.

# Deployment

The application is deployed on a Linux server running NGINX and PHP. The source code is managed using Git, and deployment is done manually.

### Deployment Procedure:

1\. Before deploying the application, make sure that the server has **PHP**, **Git** and **Composer** installed.

2\. Pull the application's sourcecode from Git repository.

3\. Next, run the following via Composer command:

```
composer install
```

```
composer run-script post-root-package-install
```

```
composer run-script post-create-project-cmd
```

4\. Define the following variables in `.env` file

<pre class="language-javascript"><code class="lang-javascript">// change to `false`

<strong>APP_DEBUG=true
</strong></code></pre>

```javascript
// add the database credentials

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=90
DB_USERNAME=root
DB_PASSWORD=
```

4\. Finally, run the following PHP Artisan command to setup the database:

```
php artisan migrate --seed
```

```javascript
// Default user account credential

Email: admin@admin.com
Password: password
```

## Credits

- [Andrei Lazaro](https://github.com/ddreilll)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
