# Movies Admin Panel

A clean architecture used to build admin dashboard

## Architecture

The Architecture I followed to design the application

```
 \App\Models
```

Models Used in Application

```
 \App\Repositories
```

Repositories and Repository Base Class to handle interaction with database instead of using regular ORM that laravel introduce.

```
 \App\Managers
```

Manager Classes to handel Application Logic

## Technology

-   Laravel 8.65
-   PHP 7.4.18

## Installation

-   Run `cp .env.example .env` and edit `.env` file with your db configurations
-   Run `composer install`
-   Run `php artisan key:generate`
-   Run `php artisan migrate --seed`
-   Run `php artisan serve`

## Routes

> /
> /movies
> /movies
> /movies
> /movies
> /movies
> /movies
