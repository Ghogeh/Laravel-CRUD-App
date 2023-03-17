<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Projects Description
 This project is an exercise to show the bases of working with CRUD (Create, Retrieve, Update, Delete) operations application in Laravel.This mini project is a simple Student Mangement system where students can be created, project created and  assigned  to students to projects ; in which we can View Delete and Edit.   There some couple of things you need to have on your system before installing laravel i.e  Composer , PHP , XAMPP server or any other Mysql server(WAMP , LAMP) 
## Step 1: Install Laravel 8
To install Laravel 8, we will need a composer and we make sure we specify the version of Laravel we need, in our case Laravel 8.

Composer create-project laravel/laravel=8 crudapp --prefer-dist

## Step 2: Database setup
Open your server, in my case xAMP server, and open phpmyadmin, thereafter, sign into MySQL database, create an empty database by clicking new on the left panealt text
Open the .env file on your IDE or text editoralt textChange the DB_DATABASE to the name of your database and if you have set a Username and password for your phpmyadmin, specify it, otherwise, leave the username as root and password blank.

## Step 3: Create Migration
we are going to create crud application for projects, in the long run, this will be a project management app, I will be writing more articles on Laravel 8, this will be a series, for the main time, lets just stop at creating a crud for projects.
First cd into the project app cd crudapp/

## php artisan make:migration create_projects_table --create=projects

alt text
A migration file will be created in the database/migrations folder, and we need to create our schema, I added name (string), introduction (string), location (string), cost of the project (float), date created, and date updated.
alt text
Before we run our migration command, we need to specify the default string length, else, we are going to run into errors
So go to app/Providers/AppServiceProvider.php and add

## Schema::defaultstringLength(191);

to the boot function, also add

## use Illuminate\Support\Facades\Schema;

to the top
alt text
Finally, we run our migration command

## Php artisan migrate

alt text

## Step 4: Add Resource Route
We need to add routes for our CRUD operations, Laravel provides a resource route for us that will take care of the CRUD, that is a route to Create, another route to Retrieve, a separate route to Update, and finally a route to Delete.
So head up to routes\web.php and add our resource route

## Route::resource(‘projects’, ProjectController::class);

Also, add the ProjectController class at the top, this was introduced in this version, Laravel 8 does not know where to call the function from

## use App\Http\Controllers\ProjectController;

## Step 5: Add Controller and Model
Previously, in step 4, the second parameter for the resource is ProjectController, so we need to create the controller and we need to specify the resource model by add --model

## Php artisan make:controller ProjectController --resource --model=Project

It will ask a question if you want to create the model because it does not exist. Type yes and it will create the model and controller
alt text
A controller for project has been created for us with the following methods in the controller folder app/Http/Controllers/ProjectController.php

index()
create()
store(Request, $request)
show(Project, $project)
edit(Project, $project)
update(Request, $request, Project, $project)
destroy( Project, $project)


## Step 6: Add your views
Laravel view files are is called the blade files, we are going to add those blade files, so a user can be able to interact with our app
I like arranging my views according to the models, so I am going to create two folders in the resources/views folder

## Layouts
app.blade.php
## Projects
Index.blade.php
Create.blade.php
Edit.blade.php
show.blade.php





