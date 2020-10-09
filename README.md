# RSSReader

An RSSReader app that allows users to sign up, login and add rss 2.0 feeds.
The dashboard will show feeds added and from there you can read the full feed.

## Getting Started

Built as a test project with Laravel 8.9.0.

### Prerequisites

PHP 7.3, Composer, Laravel are required. A compatible database such as MySQL 5.6+ is needed.

Needs an Apache or NGINX web server hosting environment. 
The project was built with Laradock so is recommended. Or an alternative Docker container can be used.
Laradock can be set up in the project folder.

### Installing


Once hosting environment is available:
Run "composer install" from the project folder. 
This should restore the Laravel vendor directory.

Run "cp .env.example .env" to create the app settings file.

Run "php artisan key:generate" to generate application key in the settings file.

It is recommended to change the app name in the .env file to RSSreader.

Create a compatible database for the project. 
(in Laradock this is easy - see its documentation)

.env needs to be amended to include database credentials once database available.

Run "php artisan migrate" to create necessary database tables.


Then nagivate to browser location where project will be served from. Using Laradock it's http://localhost.

## Built With

* [Laravel](https://laravel.com/) - The php framework used
* [Composer](https://getcomposer.org/) - PHP Dependency manager
* [Laradock](https://laradock.io/) - Docker Development environment for PHP

## Authors

* **[Andrew Nicholson](https://github.com/agdnicholson)**