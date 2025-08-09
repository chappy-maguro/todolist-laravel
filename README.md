# Todolist Laravel Project

This project is a Todo List application built with Laravel, utilizing Docker for development. Below is an overview of the project structure and setup instructions.

## Project Structure

```
todolist-laravel
├── docker
│   ├── nginx
│   │   └── default.conf
│   ├── php
│   │   └── Dockerfile
│   └── mysql
│       └── Dockerfile
├── src
│   └── (Laravel project files)
├── docker-compose.yml
└── README.md
```

## Setup Instructions

1. **Clone the Repository**
   Clone this repository to your local machine.

   ```bash
   git clone <repository-url>
   cd todolist-laravel
   ```

2. **Build and Start Docker Containers**
   Use Docker Compose to build and start the containers.

   ```bash
   docker-compose up -d
   ```

3. **Access the Application**
   Once the containers are running, you can access the application at `http://localhost`.

4. **Database Migration**
   Run the following command to migrate the database:

   ```bash
   docker-compose exec php php artisan migrate
   ```

5. **Stopping the Containers**
   To stop the containers, run:

   ```bash
   docker-compose down
   ```

## Files Overview

- **docker/nginx/default.conf**: Nginx configuration file for routing requests and proxying to PHP-FPM.
- **docker/php/Dockerfile**: Dockerfile for the PHP container, setting up necessary PHP extensions and configurations for running the Laravel application.
- **docker/mysql/Dockerfile**: Dockerfile for the MySQL container, specifying initial database setup and environment variables.
- **src/**: Directory containing the source code for the Laravel project, following the standard Laravel file structure.
- **docker-compose.yml**: Docker Compose configuration file for managing and launching multiple containers (Nginx, PHP, MySQL).
- **README.md**: Documentation containing project overview, setup instructions, and usage guidelines.

## License

This project is licensed under the MIT License. See the LICENSE file for details.