# Library Management System

## Description

This is a basic Library Management System built with Laravel 10. The application includes essential functionalities for managing categories and books, user authentication, and borrowing features. It allows users to add or remove books and track borrowed books.

The purpose of this project is to gain hands-on experience with Laravel, focusing on concepts such as routing, Eloquent ORM, and authentication. Future enhancements may include advanced search capabilities, due date reminders, and user reviews.


## Features

- **CRUD Operations** for Categories and Books
- **User Authentication** (Login & Register)
- **Middleware** for secure access to Category and Books pages (excluding show and index)
- **Book Listings** based on Category relationships
- **Display of Category Names** on Books pages
- **Borrowing Management** with features to add and list borrowings on Book detail pages

## Installation

1. Clone the repository:
```bash
   git clone https://github.com/diazlp/laravel-learn-project
   cd src
``` 

2. Install dependencies:
```bash
composer install
```

3. Copy the `.env.example` file to `.env` and configure your database settings:
```bash
composer install
```

4. Generate the application key:
```bash
php artisan key:generate
```

5. Run migrations:
```bash
composer install
```

6. Start the development server:
```bash
php artisan serve
```

## Usage
- Access the application at http://localhost:8000
- Register a new account or log in with existing credentials to manage categories and books.

## License

This project is licensed under the [MIT License](https://github.com/diazlp/laravel-learn-project?tab=MIT-1-ov-file). You are permitted to use, modify, and distribute this project for both personal and commercial purposes, provided that the copyright notice **Diaz Linggaputra** remains intact in all copies or substantial portions of the project.