## Installation instructions


- Set up a MySQL DB, go to the .env file and fill the next fields with your corresponding credentials
    * DB_HOST=127.0.0.1(the host)
    * DB_PORT=3306(the port)
    * DB_DATABASE=(your database)
    * DB_USERNAME=(your username)
    * DB_PASSWORD=(your password)

Run the following command to create migrations

```
php artisan migrate
```

- Then start your server:

```
php artisan serve
```
