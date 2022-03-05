### Build

```
docker-compose up -d --build
```

application by using URL:

```
http://host.docker.internal:8081
```

### https://github.com/DarkaOnLine/SwaggerLume
```
php artisan swagger-lume:generate
```

Unit Test
```
vendor/bin/phpunit --filter test_jwt_login
```

- Migrate partial php artisan migrate --path='./database/migrations/2022_01_07_140709_create_sub_menus_table.php' (Nothing to migrate. = Clear migrations table)

- In Repository use ifDataExists($data, $model, $dataName) for "no data found" message
