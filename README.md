### Design Pattern
```
Controller => Service => Repository
```

### Build

```
docker-compose up -d --build
```

### Docker Run
```
docker-compose up
```

### https://github.com/DarkaOnLine/SwaggerLume
```
php artisan swagger-lume:generate
```

### App url
```
http://localhost:8081/api/v1/documentation
```

### Unit Test
```
vendor/bin/phpunit --filter test_jwt_login
```

### Container execution
```
1-) docker exec -it c_phpfpm sh
2-) bash
3-) cd baskethub
```

### Db migrate 
```
- php artisan migrate
```

### Db migrate partialy
```
- Migrate partial php artisan migrate --path='./database/migrations/2022_01_07_140709_create_sub_menus_table.php' (Nothing to migrate. = Clear migrations table)
```