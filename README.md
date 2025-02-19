<p align="center">
    <h1 align="center">TECHNICAL TEST - Social Media Management Post</h1>
</p>
<br><br>

# How To Use

To use this App is very simple, you must run a simple syntax in terminal or command prompt.

### Clone The Project

```
git clone https://github.com/rizqiwahyudi/sosmed-manage-test.git
```

### Install The Project With Composer

```
composer install
```

### Copy ".env.example" file to ".env"

```
cp .env.example .env
```

or you can copy the file in your File Manager.

### Generate App_Key

```
php artisan key:generate
```

### Symlink Storage For Store Public Files

```
php artisan storage:link
```

### Initiate The Database Migration

```
php artisan migrate
```

or You can make the seed with the following command <b>(IF NECESSARY)</b> :

```
php artisan migrate --seed
```

> **NOTE : Make sure the web server and database are turned on before migration command**

### And Lastly, Run the server

```
php artisan serve
```

> **To Access API Docs use this path : /api/documentation (E.g. http://127.0.0.1:8000/api/documentation)**

# License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
