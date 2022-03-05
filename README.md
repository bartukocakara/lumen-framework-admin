### This api project is for cms of https://baskethub.netlify.app/ project 

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
### Container execution
```
1-) docker exec -it c_phpfpm sh
2-) bash
3-) cd baskethub
```
# Now we can execute composer, artisan etc. commands.

### Install required packages
```
composer install
```
### https://github.com/DarkaOnLine/SwaggerLume
```
php artisan swagger-lume:generate
```

### App url
```
http://localhost:8081/api/v1/documentation
```



### Db migrate 
```
- php artisan migrate
```

### Db migrate partialy
```
- php artisan migrate --path='./database/migrations/2022_01_07_140709_create_sub_menus_table.php' (Nothing to migrate. = Clear migrations table)
```

### Unit Test All
```
vendor/bin/phpunit
```

### Unit Test Filter
```
vendor/bin/phpunit --filter test_register
vendor/bin/phpunit --filter test_jwt_login
```