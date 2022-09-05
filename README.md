# Subscription Platform
Create a simple subscription platform(only RESTful APIs with MySQL) in which users can subscribe to a website (there can be multiple websites in the system). Whenever a new post is published on a particular website, all it's subscribers shall receive an email with the post title and description in it. (no authentication of any kind is required)

## Installation Setup
1. Clone the repository
2. Run `composer install` to install the dependencies.
3. Open your `.env` and configure your database credentials.
4. Run `php artisan migrate --seed`



## Queue
The post notification to subscribers are queued, so you will need to run `php artisan queue:listen`

## Custom Command
There is a custom command to send emails to subscribers for Posts Created: `php artisan notify:subscribers`.

