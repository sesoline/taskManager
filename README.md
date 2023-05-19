## About this

TaskManager is an web-app developed with Laravel-inertia with jetstream, it uses tailwind to CSS and Jetstreams for authentications

This web-app is an CRUD for TASKs, User cana Add, modify amd delete task. Each user has its hown Tasks and nobody can see any different taks.

### How to instal

Install `docker` and `docker-compose`

make sure you Manage Docker as a non-root user
https://docs.docker.com/engine/install/linux-postinstall/

run in terminal: 

    docker run --rm \
        -u "$(id -u):$(id -g)" \
        -v $(pwd):/var/www/html \
        -w /var/www/html \
        laravelsail/php81-composer:latest \
        composer install --ignore-platform-reqs

run `cp .env.example .env` <br/>
run `./vendor/bin/sail up` <br/>
run `./vendor/bin/sail php artisan migrate` <br/>
run `./vendor/bin/sail npm i` <br/>
run `./vendor/bin/sail npm run dev` <br/>


### After run migration

Please use the next user to test:
    email:    test@example.com
    password: testUser001
