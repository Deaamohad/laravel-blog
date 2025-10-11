# Blog Project

A simple blog built with Laravel where users can create, read, update and delete posts. This was made while learning Laravel, so it's pretty straightforward but covers the basics of web development.

## What it does

- **User stuff**: Register, login, and logout
- **Blog posts**: Create, read, update, and delete posts
- **Clean design**: Uses Tailwind CSS for styling (looks decent without being fancy)
- **Form validation**: Shows errors when you mess up the forms
- **Session management**: Keeps you logged in until you log out

## Features

- User authentication system
- CRUD operations for blog posts
- Responsive design that works on mobile
- Form validation with error messages
- Session-based authentication
- Clean URL routing

## Tech Stack

- **Backend**: Laravel (PHP)
- **Frontend**: Blade templates with Tailwind CSS
- **Database**: MySQL (or whatever you set up)
- **Server**: Laravel's built-in server (for development)

## Setup

1. Clone the repo to your local machine
2. Run `composer install` to get all the PHP dependencies
3. Copy `.env.example` to `.env` and configure your database settings
4. Run `php artisan migrate` to create the database tables
5. Run `php artisan serve` to start the development server

That's it! Open your browser and go to `http://localhost:8000` to start blogging.

## Notes

This is a learning project focused on understanding how Laravel works and getting familiar with basic web development concepts. It's designed to be simple and educational rather than feature-heavy.
