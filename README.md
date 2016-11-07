# NyabondoCRM
This is a web application for St Josephs Nyabondo High School. A few of Us who made it to Nerdslavania opted to join hands and work something out for the school. The Api is in laravel and the web(Client-side) could be on any other Javascript framework that can consume RESTful of GrapQl Apis.

## Installing The Api

Ensure You have composer installed go to [composer's official website](http://getcomposer.org), and install it globally to your Machine.

- run this command on your git bash `git clone git@github.com:ayimdomnic/NyabondoCRM.git MyRepo`
- `cd` into `MyRepo\Api`  then run `composer install`
- now  run `cp .env.example .env` then `php artisan key:generate`
- create a new database and feed the database credentials on `MyRepo\.env`
- run `php artisan migrate` then `php artisan serve` to watch the app n `localhost:8000`

## Use Case

comming soon

## Database Structures

comming soon

## CONTRIBUTORS 
At the moment

- [Robert Adero](https://github.com/RobertAdero)
- [James Oguya](https://github.com/oguya)
- [Odhiambo Dormnic](https://github.com/ayimdomnic)
