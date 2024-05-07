https://hub.docker.com/r/bitnami/laravel/

### step 1
docker network create laravel-network

## step2

docker volume create --name mariadb_data
docker run -d --name mariadb \
  -p 3306:3306 \
  --env ALLOW_EMPTY_PASSWORD=yes \
  --env MARIADB_USER=bn_myapp \
  --env MARIADB_DATABASE=bitnami_myapp \
  --network laravel-network \
  --volume ./docker/mariadb_data:/bitnami/mariadb \
  bitnami/mariadb:latest


  ## step 3

  docker run -d --name laravel \
  -p 8000:8000 \
  --env DB_HOST=mariadb \
  --env DB_PORT=3306 \
  --env DB_USERNAME=bn_myapp \
  --env DB_DATABASE=bitnami_myapp \
  --network laravel-network \
  --volume ${PWD}/my-project:/app \
  bitnami/laravel:10
