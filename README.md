# DankDevHub

Welcome to DankDevHub, a place for developers to share their dank memes or dive into deep discussions about creating their own CPUs, programming languages, and more.

## Technologies Used

Our platform is built using the following technologies:

-   PHP
-   Laravel
-   HTML
-   CSS
-   JavaScript
-   Node.js
-   MySQL
-   Bootstrap
-   MailTrap

## Core Functionalities

Some of our core functionalities include:

-   User registration and authentication
-   News feed
-   Profile management
-   Threads and posts
-   Interactive FAQ
-   Contact form (sends us an email, and we'll get back to you as soon as possible)

...and much more! ;)

## GitHub Repository

This project was developed as part of a "backend web" course at EHB. The main focus was on building robust backend functionalities, while the frontend design and refinement were not the primary priority. Feel free to edit and improve the frontend as needed if you decide to use this project as a base for your own project.

## Before You Start

Before running the project, make sure to:

1. **Edit Your .env:**

    - Copy the `.env.example` file to `.env`.
    - Set a unique `APP_KEY` using `php artisan key:generate`.
    - Set a secure password for the database (`DB_PASSWORD`).
    - Update Mail settings (`MAIL_HOST`, `MAIL_USERNAME`, `MAIL_PASSWORD`) for your mailing service.

2. **Install Dependencies:**

    - Run `composer install` to install PHP dependencies.
    - Run `npm install` to install Node.js dependencies.

3. **Run Migrations and Seed Database:**
    - Run `php artisan migrate:fresh --seed` to apply fresh database migrations and seed with sample data.

## API Documentation

For details about the DankDevHub API, please refer to our [API Documentation](API.md).

## About Us

If you have any questions or suggestions, feel free to reach out. DankDevHub is a community-driven platform, and we welcome your input.

Happy coding! 🚀
