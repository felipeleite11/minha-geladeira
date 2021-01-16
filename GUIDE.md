# Laravel CLI guide

## Creating a Laravel project

```shell
composer create-project laravel/laravel example-app
```
<br/>

## Configuring the timezone and locale

In **config/app.php** file:
- Change the **timezone** value to your timezone (Ex.: America/Belem).
- Change the **locale**, **fallback_locale** and **faker_locale** value to **pt_BR**.

<br/>

## Migrations

### Generating migrations

```shell
php artisan make:migration create_<migration_name>_table [--create=<table_name>]
```

### Migration **up()** function example:

```js
public function up()
{
    Schema::create('table_name', function (Blueprint $table) {
        $table->id();
        $table->string('column_1');
        $table->integer('column_2');
        $table->timestamps();
    });
}
```

[All available column types](https://laravel.com/docs/8.x/migrations#available-column-types)

### Running all / re-running all / undoing / undoing all migrations

```shell
php artisan migrate
```

```shell
php artisan migrate:fresh
```

```shell
php artisan migrate:rollback --step=2
```

```shell
php artisan migrate:reset
```
<br/>

## Seeders

### Generating seeders

```shell
php artisan make:seeder EntitySeeder
```

### Running all seeders

```shell
php artisan db:seed
```

### Running a specific seeders

```shell
php artisan db:seed --class=UserSeeder
```
