# OVS App

## Introduction

OVS App adalah aplikasi pemilihan umum

## Presentation

[Presentation](https://www.canva.com/design/DAGtmR1ZOLs/W_68gOQav558RTy9TAK74A/edit?utm_content=DAGtmR1ZOLs&utm_campaign=designshare&utm_medium=link2&utm_source=sharebutton)

## Installation

Make sure you have Laravel 10 installed

### Step 1: Clone the Repository

```bash
git clone https://github.com/ahmdims/SEVIMA
cd SEVIMA
```

### Step 2: Install Dependencies

```bash
composer install
```

### Step 3: Set Up Environment File

```bash
php -r "file_exists('.env') || copy('.env.example', '.env');"
```

### Step 4: Configure the Database

Open the `.env` file and update the database connection settings:

```dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=sevima_db
DB_USERNAME=root
DB_PASSWORD=
```

### Step 5: Generate Application Key

```bash
php artisan key:generate
```

### Step 6: Run Database Migrations

```bash
php artisan migrate
```

### Step 7: Seed the Database

```bash
php artisan db:seed
```

### Step 8: Link data from storage

```bash
php artisan storage:link
```

### Step 9: Start the Development Server

```bash
php artisan serve
```

Your OVS App application should now be up and running. You can access it at `http://127.0.0.1:8000`.

### Step 10: Tes Login

```bash
Email: admin@example.com
Password: 12345678
```
