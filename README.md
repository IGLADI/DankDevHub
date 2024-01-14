# DankDevHub

Welcome to DankDevHub, your go-to space for developers to share hilarious memes or engage in profound discussions about creating CPUs, programming languages, and beyond.

## Technologies Used

Our platform is powered by a robust stack of technologies:

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

Explore our core features:

-   User registration and authentication
-   News feed
-   Profile management
-   Threads and posts
-   Interactive FAQ
-   Contact form (send us an email, and we'll respond ASAP)

...and much more! 😉

## GitHub Repository

This project originated as part of a "backend web" course at EHB. While the primary focus was on building a strong backend, feel free to refine and enhance the frontend if you decide to use this project as a foundation for your own.

## Before You Start

Ensure a smooth setup before running the project:

1. **Install Dependencies:**

    - If you are using PowerShell, you can execute `dependencies.ps1` as an administrator to install all required dependencies, if you have not already scripts turned on please run `set-executionpolicy Bypass` in PowerShell as an administrator.

    _OR_

    Alternatively, if you are not using PowerShell, you can examine the `dependencies.ps1` file to see the list of required dependencies and install them manually.

2. **Set Up**

    - Copy `.env.example` to `.env` and update it accordingly.
    - Generate a unique `APP_KEY` using `php artisan key:generate`.
    - Set a secure password for the database (`DB_PASSWORD`).
    - Update Mail settings (`MAIL_HOST`, `MAIL_USERNAME`, `MAIL_PASSWORD`) for your mailing service.

3. **Run Migrations and Seed Database:**

    - Execute `php artisan migrate:fresh --seed` to apply fresh database migrations and seed with sample data. (this should already be done if running `dependencies.ps1`)

4. **Create Symbolic Link for Storage:**

    - Run `php artisan storage:link` to create a symbolic link from the `public/storage` directory to the `storage/app/public` directory. (this should already be done if running `dependencies.ps1`)

5. **Start the Project:**

    - If you are using PowerShell, you can execute `start.ps1` to initiate the project.

    _OR_

    Alternatively, if you are not using PowerShell, you can examine the `start.ps1` file to see the commands required to start the project and execute them manually:

    - Install dependencies using appropriate package managers.
    - Run migrations (`php artisan migrate:fresh --seed`).
    - Start the project by running `php artisan serve` in `./DankDevHub` and `node app.js` in `./nodejs-api`.

## Running the Project

Once everything is set up, you can access the project by navigating to the specified URL.

## API Documentation

Refer to our [API Documentation](API.md) for comprehensive details about the DankDevHub API.

## About Us

If you have questions or suggestions, reach out! DankDevHub thrives on community input.

Happy coding! 🚀
