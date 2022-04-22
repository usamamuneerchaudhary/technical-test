## About Software Development @ Cyberhawk

need some content for this section

## The task
We've designed this task to try and give you the ability to show us what you can do and hopefully flex your technical and creative muscles. You can't show off too much here, show us you at your best and wow us!

To make things as simple as we could, we've opted to use [Laravel Sail](https://laravel.com/docs/8.x/sail) to provide a quick and convenient development environment, this will require you to install
[Docker Desktop](https://www.docker.com/products/docker-desktop) before you can start the test. We've provided [some more detailed instructions](#setting-everything-up) below in case this is your first time using Docker or Sail.

We'd like you to build an application that will display an example wind farm, its turbines and their components.
We'd like to be able to see components and their grades (measurement of damage/wear) ranging between 1 - 5.

For example, a turbine could contain the following components:
- Blade
- Rotor
- Hub
- Generator

Don't worry about using real names for components or accurate looking data, we're more interested in how you structure the application and how you present the data.

Don't be afraid of submitting incomplete code or code that isn't quite doing what you would like, just like your maths teacher, we like to see your working.
Just Document what you had hoped to achieve and your thoughts behind any unfinished code, so that we know what your plan was.

### Requirements
- Display a list of turbine inspections
- Each Turbine should have a number of components
- A component can be given a grade from 1 to 5 (1 being perfect and 5 being completely broken/missing)
- Use Laravel Models to represent the Entities in the task.

### Bonus Points
- Great UX/UI
- Use of React JS
- Use of Tailwind CSS
- Use of 3D
- Use of a web map technology in the display of the data
- Automated tests
- API Authentication
- Use of coding style guidelines (we use PSR-12 and AirBnb)
- Use of git with clear logical commits
- Specs/Plans/Designs

### Submitting The Task
We're not too fussy about how you submit the task, providing it gets to us and we're able to run it we'll be happy however here are some of the ways we commonly see:
- Fork this repo, work and add us as a collaborator on your GitHub repo and send us a link
- ZIP the project and email it to us at nick.stewart@thecyberhawk.com

## Setting Everything Up
As mentioned above we have chosen to make use of Laravel Sail as the foundation of this technical test.
- If you haven't already, you will need to install [Docker Desktop](https://www.docker.com/products/docker-desktop).
- One that is installed your next step is to install this projects composer dependencies (including Sail).
    - This will require either PHP 8 installed on your local machine or the use of [a small docker container](https://laravel.com/docs/8.x/sail#installing-composer-dependencies-for-existing-projects) that runs PHP 8 that can install the dependencies for us.
- If you haven't done so already copy the `.env.example` file to `.env`
    - If you are running a local development environment you may need to change some default ports in the `.env` file
        - We've already changed mysql to 33060 and NGINX to 81 for you
- It should now be time to [start Sail](https://laravel.com/docs/8.x/sail#starting-and-stopping-sail) and the task

### Installing Composer Dependencies
https://laravel.com/docs/9.x/sail#installing-composer-dependencies-for-existing-projects
```bash
docker run --rm \
-u "$(id -u):$(id -g)" \
-v $(pwd):/var/www/html \
-w /var/www/html \
laravelsail/php81-composer:latest \
composer install --ignore-platform-reqs
```

## Your Notes


### Task understanding & My Implementations

As per my research on what cyberhawk does & the solutions this company provides to different sectors.
This task mainly focuses on how the candidate showcases the turbine operations installed into a farm in the best
way possible.

My approach is yet simple for this problem. I've created a single farm page(single page as you call it in WP), that
displays the turbines installed in the respective farm with the data associated with each turbine. Data includes the
type of turbine, its grade, its location, components, and uuid.

Turbine grade is really important here as I've implemented animation for the turbine & the speed of rotation is mainly
based on the grade level. For instance, grade 1 means the turbine has no issues at all and works at full speed. Whereas,
grade 5 means, turbine needs some fixes hence moving dead-slow.

### DB Architecture

The initial step was to construct the DB Architecture for this application since SQL performance plays a major role 
when 
application scales. The DB is quite simple as shown in the ERD below.  

Few things to note here while I was finalizing the fields: 
- `UUID` field in farms & turbines tables. This uuid is the unique identifier of each farm and turbine which would 
  help to 
  locate more easily.   
- `slug` field in components. The slug field approach I took from WP and i think this unique slug could come handy 
  when implementing URL structures &  searching. Instead of creating slugs on the run-time.

![Project ERD](erd.png?raw=true "ERD")

#### Application Data Setup

Seeders & Factories are being set up for each model to arrange dummy data which will help in testing.
To use seeders, run `php artisan migrate:fresh --seed`

#### Unit Tests

Some basic unit tests performed which mainly focuses on end-to-end application layout on the browser. 
To run unit tests, run `/vendor/bin/phpunit`

#### API Authentication & Endpoints

Since Laravel Sanctum comes in default with all Laravel apps now. I've used sanctum to build a simple API that'll be 
used if we need to switch over our application to some SPA. These endpoints are just for the demonstration purposes. 
Postman file included in the root directory.

Furthermore, I've also created a couple of endpoints for creating and listing turbines. Single responsibility 
principle being followed here to design these controllers. 
Inside of these controllers, we can reduce `try|catch` blocks to reduce number of lines as well.

#### Frontend

For the frontend, I preferred a quick solution to design my page. `tailwindcss` is being used. I've used a
combination of `tailwindui` components to improve my application's UI/UX.
Simple CSS animation used for turbines.

#### Final Thoughts

Overall, I really enjoyed working on this unique and interesting technical test. To properly implement the use-case of 
farm and turbines in the application code seemed a bit confusing at first. But as the development grows and 
understanding being developed of what cyberhawk does, this turned out to be extremely interesting to myself. 

Hope to hear from you soon!
