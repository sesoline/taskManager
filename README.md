## TaskManager

TaskManager is a web application developed using Laravel Inertia with Jetstream. It utilizes Tailwind CSS for styling
and Jetstream for authentication.

The purpose of this web application is to provide a CRUD (Create, Read, Update, Delete) functionality for tasks. Users
can add, modify, and delete tasks. Each user has their own set of tasks, and no one else can see or access their tasks.

### Installation

Before proceeding with the installation, please ensure that you have Docker and Docker Compose installed on your
machine. If not, you can follow the instructions provided in the links below:

- Docker: [https://docs.docker.com/engine/install/](https://docs.docker.com/engine/install/)
- Docker Compose: [https://docs.docker.com/compose/install/](https://docs.docker.com/compose/install/)

And make sure you Manage Docker as a [non-root user](https://docs.docker.com/engine/install/linux-postinstall/)


Once Docker and Docker Compose are installed, please follow the steps below:

1. Open a terminal and navigate to the project directory.

2. Run the following command in the terminal:

   ```shell 
   docker run --rm \
        -u "$(id -u):$(id -g)" \
        -v $(pwd):/var/www/html \
        -w /var/www/html \
        laravelsail/php81-composer:latest \
        composer install --ignore-platform-reqs
   ```
   
    ```shell
    cp .env.example .env
    ```

    ```shell
    ./vendor/bin/sail up -d 
    ```

    ```shell
    ./vendor/bin/sail php artisan migrate 
    ```

3. If migrations fails, probably container does not have write access, run:

    ```shell
    ./vendor/bin/sail root-shell;
    ```
   And inside the container shell run `cd ..; chown -R sail:sail html; exit`: \
   Now, run Migrations again 


4. And finish installing all npm pkgs: 

    ```shell
    ./vendor/bin/sail npm i 
    ```       
    
    ```shell
    ./vendor/bin/sail npm run dev
    ```
    
Remember to change in `.env` the `APP_PORT` for an available slot in your PC

visit [localhost:7777](`localhost:{APP_PORT}`)

### After run migration

Please use the next user to test:
    email:    test@example.com
    password: testUser001
