### Build

```
docker-compose up -d --build
```

# Docker Run
```
docker-compose up
```

### https://github.com/DarkaOnLine/SwaggerLume
```
php artisan swagger-lume:generate
```

app url
```
http://localhost:8081/api/v1/documentation
```

Unit Test
```
vendor/bin/phpunit --filter test_jwt_login
```

- Migrate partial php artisan migrate --path='./database/migrations/2022_01_07_140709_create_sub_menus_table.php' (Nothing to migrate. = Clear migrations table)

- In Repository use ifDataExists($data, $model, $dataName) for "no data found" message
