# OVS App - Online Voting System

## Introduction

The OVS App is a modern and intuitive online voting system designed to facilitate secure and efficient elections. Whether for academic institutions, community organizations, or private groups, OVS App provides a reliable platform for managing candidates, events, and voter participation. Its streamlined installation process makes it easy to set up and deploy, ensuring a smooth voting experience for administrators and users alike.

## Presentation

For a visual overview and more details about the OVS App, please refer to our presentation:
[OVS App Presentation](https://www.canva.com/design/DAGtmR1ZOLs/W_68gOQav558RTy9TAK74A/edit?utm_content=DAGtmR1ZOLs&utm_campaign=designshare&utm_medium=link2&utm_source=sharebutton)

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

Local Environment

```dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=sevima_db
DB_USERNAME=root
DB_PASSWORD=
```

Docker Environment

```dotenv
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=sevima_db
DB_USERNAME=sevima_app
DB_PASSWORD=secret
```

## Docker Environment [detailed installation info using Docker](https://github.com/ahmdims/SEVIMA/blob/main/docker/README.md)

````dotenv
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=sevima_db
DB_USERNAME=sevima_app
DB_PASSWORD=secret

### Step 5: Generate Application Key

```bash
php artisan key:generate
````

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

### Step 11: Docker Setup (Optional)

If you're using Docker, make sure you have Docker and Docker Compose installed, then run:

```bash
docker-compose up -d --build
```

Ensure your `.env` file is set to use Docker-based DB settings (as shown above).
