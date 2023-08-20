# Learning Symfony 5 Project

Hello there! This repository contains the code and scripts for my Symfony 5 learning project. I'm using the tutorials
from SymfonyCasts to dive into the world of Symfony development.

## Motivation

I'm building this project as a way to learn and practice Symfony 5 concepts. The repository is inspired by the Symfony5
Tutorials on SymfonyCasts, but I'm putting in my own effort to understand and implement the code.

## Getting Started

If you've just downloaded the code, congratulations!

To get it up and running, follow these steps:

1. **Download Composer dependencies**
    - Make sure you have Composer installed and then run:
      ```
      composer install
      ```
      Note: You might need to use `php composer.phar install` based on your Composer installation method.

2. **Database Setup**
    - The code includes a `docker-compose.yaml` file, which suggests using Docker for the database.
    - If you prefer using Docker, ensure you have it installed and running. Start the container:
      ```
      docker-compose up -d
      ```
    - Build the database and execute migrations with:
      ```
      symfony console doctrine:database:create
      symfony console doctrine:migrations:migrate
      symfony console doctrine:fixtures:load
      ```
      (If you encounter a "MySQL server has gone away" error, wait a few seconds and try again as the container might
      still be booting).
    - Alternatively, if not using Docker, set up your database server and update the `DATABASE_URL` environment variable
      in `.env` or `.env.local` before running the above commands.

3. **Start the Symfony web server**
    - You can opt for Nginx or Apache, but Symfony's local web server is recommended.
    - Install the Symfony local web server by following the instructions [here](https://symfony.com/download). You only
      need to do this once.
    - To start the web server, navigate to the project directory and run:
      ```
      symfony serve
      ```
      (If this is your first time using this command, you might need to run `symfony server:ca:install` first).
    - Access the site at [https://localhost:8000](https://localhost:8000).

## Optional: Webpack Encore Assets

This app utilizes Webpack Encore for CSS, JS, and image files. However, the final built assets are already included in
the project. You don't need to do anything to set this up!

If you're interested in building Webpack Encore assets manually, follow these steps:

1. Ensure you have Yarn installed.
2. Run:

```
    yarn install
    yarn encore dev --watch
```