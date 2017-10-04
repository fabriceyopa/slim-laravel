# Slim 3 Skeleton 
**This is Laravel like Project base on Slim 3**

This project is based on a CodeCourse.com video with personal changes to start faster with Slim 3.
With Auth provided.

# Installation 
    composer require fabrice/laravel-clone
# Runing
    cp env.example .env
And edit your database credential
   
**Packages Included**
- Slim PHP DI  [Slim-Bridge](https://github.com/PHP-DI/Slim-Bridge)
- Eloquent Model  [Eloquent](https://github.com/illuminate/database)
- PHP Mailer Wrapper  [PHPMailer](https://github.com/PHPMailer/PHPMailer)
- Environment File .env [vlucas/phpdotenv](https://github.com/vlucas/phpdotenv)
- Validation Handling [Respection Validation](https://github.com/Respect/Validation)
- Flash Message [Slim Build in Class](https://github.com/slimphp/Slim-Flash)
- Slim Twig View [Twig-View](https://github.com/slimphp/Twig-View)
- Slim CSRF Protection [Slim-CSRF](https://github.com/slimphp/Slim-Csrf)
- Configuration File [Hassankhan/config](https://github.com/hassankhan/config)

## File Structure
    app
        Controllers : All project Controllers
        Models : All Project Models
        Support : All buildin Interface
    boostrap
        container.php : All Dependency Injection
        database.php : Database Configuration base on the .env file
    public
        All accessible file
    config
        database : All Database configuration
        mail : mail sending configuration
   
## TO DO
- Adding Mail Wrapper PHPMailer or SwiftMailer
- Create a web shop base on the structure
- Change Router call to feel like Laravel
- Adding Tests

any suggestion is welcome

## Demo
A complete demo is coming, with Email, Queue, Json and more.
Stay stune.
