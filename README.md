# Back End: medialab loan application Brusselaers Niko

this is an application design als a tool to keep inventory of the items in the medialab and to keep track of the loans of the items.

## Table of content
- [Front End: wikiwall Brusselaers Niko](# Back End: medialab loan application Brusselaers Niko)
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
```docker run --rm \
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
    (used to generate the content and json files)
- react: https://reactjs.org/
- react-router: https://reactrouter.com/
    (used to create the routing)
- react three fiber: https://docs.pmnd.rs/react-three-fiber/getting-started/introduction
- react three drei: https://www.npmjs.com/package/@react-three/drei
- how to use gltf : https://stackoverflow.com/questions/71589738/how-do-i-properly-use-drei-usegltf
    (used to create and controll 3d models)
- css grid refresh: https://www.youtube.com/watch?v=jV8B24rSN5o
    (used to create the grid)
- framer motion: https://www.framer.com/motion/
- framer motion paralax: https://codesandbox.io/s/framer-motion-parallax-effect-nhsh3
    (used to create the paralax effect)