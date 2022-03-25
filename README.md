## Sobre o projeto

Neste projeto foi feito uma criação de projeto usando o composer 

```
composer create-project laravel/laravel aula-01
```
Usamos as credencias do banco no arquivo .env
```

DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=aula1
DB_USERNAME=postgres
DB_PASSWORD=XXXXXXX

```

#Projeto

##Passo 1
- Criação de Migrations
- Criação de Seed
- Criação de Factory


```
php artisan make:model Role -m
php artisan make:seed UserTableSeeder
php artisan make:seed RoleTableSeeder
php artisan make:factory RoleFactory

```


##Passo 2
- Rodando migrations

```
php artisan migrate
--
php artisan migrate:fresh --seed //roda as migrations com as seeds apagando o banco

```

##Passo 3
- Criando os controller

```
php artisan make:controller UsersController --resource
php artisan make:controller RolesController --resource

```


##Passo 4
- Cadastrando as rotas


```
web.php

Route::group(['middleware'=>['auth']], function(){
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('users',UserController::class);
    Route::resource('roles',RoleController::class);
});

api.php


Route::group(['prefix'=>'v1'], function(){
    Route::apiResource('roles', RoleController::class);
});

```


##Passo 5
- Criando as views
- Criando os componentes em vue



#**Seja feliz!!!!!**

