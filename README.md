# Kwis

Small dummy project to show PHP + MySQL in a Docker environment.

To use, create a `MYSQL_DB_PASSWORD` file in the root directory of the project, containing the database password.

Fire up the whole thing with:

```zsh
docker-compose build
docker-compose pull
docker-compose up
```

Note: I'm using the `arm64v8/mysql:oracle` docker image to be able to run on my M1 MacBook Pro.
