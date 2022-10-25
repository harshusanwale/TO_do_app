# TO_do_app
REST API with Passport Authentication in laravel 8.

# Requirements
1. xampp server
2. PHP ^7.3|^8.0
3. Laravel 8

# Installation

Clone the repository-
1.git clone  git@github.com:harshusanwale/TO_do_app.git
  
Then cd into the folder with this command-
2.cd TO_do_app

Then do a composer install
3.composer install

Then edit .env file with appropriate credential for your database server. Just edit these  parameter(DB_DATABASE,
DB_USERNAME)
4.env file name = env.example .env
 
5.php artisan key:generate


#### Passport Installation

To get started, install Passport via the Composer package manager:

``composer require laravel/passport``

The Passport service provider registers its own database migration directory with the framework, so you should migrate your database after installing the package. The Passport migrations will create the tables your application needs to store clients and access tokens:

``php artisan migrate``

Next, you should run the `passport:install` command. This command will create the encryption keys needed to generate secure access tokens. In addition, the command will create "personal access" and "password grant" clients which will be used to generate access tokens:

``php artisan passport:install``

####  Passport Configuration

After running the `passport:install` command, add the `Laravel\Passport\HasApiTokens` trait to your `App\Models\User` model. This trait will provide a few helper methods to your model which allow you to inspect the authenticated user's token and scopes:

```
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
}
```

Next, you should call the `Passport::routes` method within the `boot` method of your `AuthServiceProvider`. This method will register the routes necessary to issue access tokens and revoke access tokens, clients, and personal access tokens:

```
<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Passport::routes();
    }
}
```

Finally, in your `config/auth.php` configuration file, you should set the `driver` option of the `api` authentication guard to `passport`. This will instruct your application to use Passport's `TokenGuard` when authenticating incoming API requests:

```
'guards' => [
    'web' => [
        'driver' => 'session',
        'provider' => 'users',
    ],

    'api' => [
        'driver' => 'passport',
        'provider' => 'users',
    ],
],
```

Then create a database named blog and then do a database migration using this command-
6. php artisan migrate
7. php artisan db:seed

# Run server
Run server using this command-
php artisan serve

Now simply you can run above listed url like:

- **User Register API:** Verb:POST, URL:http://127.0.0.1:8000/api/register and for authentication using bearer token
- request param : name:harshita
                 email:@gmail.com
                 password:12345678 
- **User Login API:** Verb:POST, URL:http://127.0.0.1:8000/api/login  and for authentication using bearer token
- request param : name:test@gmail.com
                 password:12345678 
- **task create API:** Verb:POST, URL: http://127.0.0.1:8000/api/todo/add and for authentication using bearer token
- request param : task:vvdfd
                  user_id:10
- **status change API:** Verb:POST, URL: [http://127.0.0.1:8000/api/todo/status and for authentication using bearer token
-  request param : task_id:1
                  status:done




