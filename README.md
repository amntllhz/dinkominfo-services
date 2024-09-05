# eGoverse

<p align="center">
  <img src="https://github.com/drchmsyh/diger/assets/logo-nav.svg" alt="eGoverse Logos" width="50%">
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

1. Clone the Repository

```
# Clone this repository
git clone [repository-url]

# Navigate to the project folder
cd egoverse
```

2. Set Up the Laravel Environment

```
# Install the dependencies
composer install

# Duplicate the .env.example file and rename it to .env
cp .env.example .env

# Generate an application key
php artisan key:generate
```

3. Set Up the Database

```
# Run the database migrations
php artisan migrate
```

4. Set Up File Storage

```
# Create the symbolic link
php artisan storage:link
```

5. Set Up the Frontend

```
# Install the Node.js dependencies
npm install
```

6. Create Admin User

To create an admin user for the Filament admin panel, run the following command:

```
php artisan make:filament-user
```

7. Run the Application

For development:

```
# Run Vite development server
npm run dev

# In a separate terminal, run Laravel development server
php artisan serve
```

For production:

```
# Build frontend assets for production
npm run build

# Run Laravel development server
php artisan serve
```

8. Access the Application

Open your web browser and go to:

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
