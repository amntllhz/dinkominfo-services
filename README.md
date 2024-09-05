# eGoverse

<p align="center">
  <img src="https://raw.githubusercontent.com/drchmsyh/egoverse/de8e3ed89bbf456ea766f12ebdde46de2c6e282b/public/logo-nav.svg" alt="eGoverse Logos" width="25%">
</p>

eGoverse is an innovative OPD (Regional Apparatus Organization) Digitalization Service Portal designed to facilitate the submission of Clearance, Server, Device services, and other support to enhance the efficiency and performance of Regional Apparatus Organizations (OPD) in Pekalongan Regency. This system is built using Laravel and Tailwind CSS.

## Features

-   Easy and efficient service submission process
-   Quick and simple report submission
-   Real-time tracking of submission status
-   Integrated admin system management

## Tech Stack

-   [Laravel](https://laravel.com/) – Framework
-   [PHP](https://www.php.net/) – Language
-   [MySQL](https://www.mysql.com/) – Database
-   [Tailwind CSS](https://tailwindcss.com/) – Styling
-   [Filament](https://tailwindcss.com/) – Admin

## Prerequisites

Make sure you have the following software installed on your machine:

-   PHP >= 8.1
-   Composer >= 2.2.6
-   MySQL >= 10.4.24
-   Node.js >= 14.0.0
-   NPM (comes with Node.js)

## Getting Started

Follow these instructions to get a copy of the project up and running on your local machine for development and testing purposes.

## Installation

### Clone the Repository

```
git clone [repository-url]

cd egoverse
```

### Set Up the Laravel Environment

```
composer install

cp .env.example .env

php artisan key:generate
```

### Set Up the Database

```
php artisan migrate
```

### Set Up File Storage

```
php artisan storage:link
```

### Set Up the Frontend

```
npm install
```

### Create Admin User

```
php artisan make:filament-user
```

### Run the Application

For development:

```
npm run dev

# In a separate terminal, run Laravel development server

php artisan serve
```

For production:

```
npm run build

# In a separate terminal, run Laravel development server

php artisan serve
```

### Access the Application

```
http://localhost:8000
```

To access the Filament admin panel, go to:

```
http://localhost:8000/admin
```

Use the email and password you set up in step 6 to log in to the admin panel.

## Contributors

-   [Dirchamsyah](https://github.com/drchmsyh) - Fullstack Developer
-   [M Aldi Amanatullah S](https://github.com/amntllhz) - UI/UX Designer, and Frontend Developer
-   Muhammad Khafid Al Amien - Frontend Developer
-   Azfi Yudan - Graphic Designer
-   Irfan Yoga Narotama
-   Ahmad Rifqi Maulana

## Licence

&copy; eGoverse - 2024
