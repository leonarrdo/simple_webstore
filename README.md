# PHP - Simple WebStore

## Requirements

- **Composer** ≥ 2.8.3  
- **Node.js** ≥ 18.0  
- **PHP** ≥ 8.2

## 🚀 Installation and Execution

Copy the example environment file and create your own `.env`:
```
cp .env.example .env
```

Install frontend dependencies:
```
npm install
```

Install backend dependencies:
```
composer install
```

Generate the application key:
```
php artisan key:generate
```

Create the symbolic link for storage:
```
php artisan storage:link
```

Run database migrations and seeders:
```
php artisan migrate --seed
```

Start the development servers:
```
php artisan serve
npm run dev
```