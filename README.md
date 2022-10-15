# <img src="public/img\985px-Laravel.svg.png" alt="drawing" style="width:60px;"/> Restaurant Management System

This **Restaurant Management System** can manage ordering and reservation process for customer. This system is developed for providing the food ordering and table reservation service to the customer. There are two types of user in this system which are admin and customer. Admin can handle customer information and also handle menu item by categories.

<br>

## Installation

---

Please follow the below instruction to run the project.

Clone the repository

```sh
git clone git@github.com:AfiaAkterMunni/Restaurant-Management-System.git
```
Switch to the repo folder

```sh
cd Restaurant-Management-System
```
Install all the dependencies using composer
```sh
composer install
```
Copy the `.env.example` file and make the required configuration changes in the `.env` file
```sh
cp .env.example .env
```
Generate a new application key
```sh
php artisan key:generate
```
Run the database migrations **(Set the database connection in .env before migrating)**
```sh
php artisan migrate
```
Run the database seeder
```sh
php artisan db:seed
```
Start the local development server
```sh
php artisan serve
```
You can now access the server at http://localhost:8000

<br>

## Admin Credentials

You can now access Admin dashboard at http://localhost:8000/login

```
email: admin@gmail.com
password: password
```
