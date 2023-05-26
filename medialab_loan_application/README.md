# Back End: medialab loan application Brusselaers Niko

this is an application design als a tool to keep inventory of the items in the medialab and to keep track of the loans of the items.

## Table of content
- [Back End: medialab loan application Brusselaers Niko](# Back End: medialab loan application Brusselaers Niko)
  - [Table of content](#table-of-content)
  - [Installation](#installation)
    - [Requirements](#requirements)
    - [Setup](#setup)
  - [links](#links)
    - [used references:](#used-references)


## Installation
### Requirements
to install and run this application you will need the following:
  - docker: https://docs.docker.com/get-docker/
  - linux distro VM or OS,
  - composer: https://getcomposer.org/download/

### Setup
to install and run this application you will need the following:
  - clone this repository
  - navigate to the root of the project
  - run following series of commands at once:
```
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php82-composer:latest \
    composer install --ignore-platform-reqs
```
- copy the .env.example file and rename it to .env
- update the .env file with the correct credentials and change app_debug to false
- run the command `./vendor/bin/sail up` to start the docker containers
- open up a new terminal and run the command `./vendor/bin/sail composer install` to install all composer dependencies
- run the command `./vendor/bin/sail npm install` to install all npm dependencies
- run the command `./vendor/bin/sail npm run build` to compile styling for the application
- run the command `./vendor/bin/sail artisan migrate` to create database tables
- run the command `./vendor/bin/sail artisan db:seed` to seed the database

## links

### used references:
- chatGPT: https://chat.openai.com/ 
- laravel docs: https://laravel.com/docs/10.x/installation
- laravel spatie: https://spatie.be/docs/laravel-permission/v5/introduction
- laravel breeze: https://laravel.com/docs/10.x/starter-kits#laravel-breeze
- tailwindcss docs: https://tailwindcss.com/
- how to store and use image: 
  - https://stackoverflow.com/questions/48945935/storing-a-photo-in-laravel-migration-files-structure
  - https://larainfo.com/blogs/laravel-9-image-file-upload-example
  - https://www.youtube.com/watch?v=GI_H9V7DtFY
  - https://laracasts.com/discuss/channels/laravel/how-to-set-a-value-to-a-file-input-in-laravel
