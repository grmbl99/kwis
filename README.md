# Kwis

Small dummy project to show PHP + MySQL in a Docker environment.

To use, create a `MYSQL_DB_PASSWORD` file in the root directory of the project, containing the database password.

Fire up the whole thing with:

```zsh
docker-compose build
docker-compose pull
docker-compose up
```

Recreate the `testdb` database with:

```zsh
docker-compose exec -T database mysql -u test_user -ppassword testdb < database/testdb-dump.sql
```

## MySQL docker image

I'm using the `arm64v8/mysql:oracle` docker image to be able to run on my M1 MacBook Pro.

On Windows, use the `mysql:oracle` docker image instead.

## How to dump the database

Dump the `testdb` database with:

```zsh
docker-compose exec database mysqldump -u test_user -p testdb
```
