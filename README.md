# Eukles's test built with Laravel

## Installation

### Prerequisites

-   [Docker](https://docs.docker.com/get-docker/)

1. Clone the repository
2. In the project's root directory run this command

```bash
docker-compose up -d
```

3. After the completion of the command, use http://localhost:3000 to access the site.

-   http://localhost:5000 serves a tool for database management.

## Installation without Docker

### Prerequisites

-   php >= 7.3
-   composer

1. Run `composer install` in the project's root directory
2. Import the dump file `dump.sql` into MySQL
3. Update database configuration in the `.env` file
4. Run `php artisan serve` and open http://localhost:8000 to access the site
