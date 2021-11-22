# Laravel company ledger app

> This is a project for a job application. Built on Win10 machine, tested on Chrome. Technologies used:
```
Laravel 8
Bootstrap 4
MYSQL database
PHP 8
```

## Features

* Data accessible only for registered user (no registration provided as per request);
* Laravel Auth used for login process;
* 2 DB tables, Companies and Employees (using Request class validation methods)
* Companies can be deleted once there are no employees attached;
* DataTables.net implementation;
* Send an automated email to company about successful registration (using Mailtrap);
* Migrations, Seeds and CRUD methods used;
* Pagination;
* Responsive design
* All information comes from DB


## Setup

**Clone Repository**

Navigate to the location you want to clone the repository via your terminal window and type in:

```
git clone https://github.com/MarkBukowski/itoma-task
```

Jump up to the cloned project folder and install the Laravel framework alongside with necessary dependencies.

Make sure you have [Composer installed](https://getcomposer.org/download/)
and then run:

```
composer install
```
After the setup finishes, install npm:

```
npm install
```

**Setup database**

Copy the `.env.example` file and name it `.env`.
```
copy .env.example .env
```
Create a local DB. I used Xampp. Name it the same as `DB_DATABASE` field in your .env file

**Generate key**

Update the `.env` file by generating a new key:

```
php artisan key:generate
```

**Run migrations**

Link storage folder and seed the database tables to update the newly created DB:
```
php artisan storage:link
```

```
php artisan migrate:fresh --seed
```

**Start the web server**

You can use Nginx or Apache, but the built-in web server works great:

```
php -S localhost:8000 -t public
```

### Login credentials
Email: `admin@admin.com`
Password: `password`

## Authors
[MarkBukowski](https://github.com/MarkBukowski)
