# Laravel URL Shortener

A simple Laravel 10 application for generating short URLs with expiration time and tracking visit history.

## Features

- Generate short links with expiration (hours & minutes)
- View visit statistics: IP, user agent, and timestamp
- Automatically disables expired links (UI shows them as strikethrough)
- Delete short links
- Ukrainian localization
- Bootstrap 5 UI
- Dockerized with Laravel Sail

## Requirements

- Docker + Docker Compose
- Git
- Composer (optional, used by Sail internally)

## Getting Started

### 1. Clone the Repository

```bash
git clone https://github.com/your-username/url-shortener.git
cd url-shortener
```

### 2. Copy .env and Set App Key

```bash
cp .env.example .env
```

### 3. Start the Environment via Sail

```bash
composer install
```

##### 3.1. Start docker

```bash
./vendor/bin/sail up -d
```

### 4. Generate Application Key

```bash
./vendor/bin/sail artisan key:generate
```

### 5. Run Migrations

```bash
./vendor/bin/sail artisan migrate
```

### 6. Access the App

Visit http://localhost

### 7. Stop the App

```bash
./vendor/bin/sail stop
```

## PHP code

```bash
./vendor/bin/pint
```

