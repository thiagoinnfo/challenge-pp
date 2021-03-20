# Challenge PP

Transfers between accounts

## Requeriments

Install the [ Docker ](https://docs.docker.com/engine/)
and [ Docker Compose](https://docs.docker.com/compose/).

## Installation

Clone the repository

```bash
git clone https://github.com/thiagoinnfo/desafio-pp
```

Rename the file .env.example to .env

```bash
cp .env.example .env
```

Start the containers

```bash
docker-compose up -d
```
Install the dependencies using composer

```bash
docker exec -ti pp-app composer install
```

Run the migrations

```bash
docker exec -ti pp-app php artisan migrate
```

Run the seeds

```bash
 docker exec -ti pp-app php artisan db:seed
```

## How to use

Request

```
POST
/transaction

{
    "value" : 500,
    "payer" : 1,
    "payee" : 2
}
```
Collection postman

```
https://www.getpostman.com/collections/8321f250a8e346012d19
```

## Tests

Run tests

```bash
docker exec -ti pp-app ./vendor/bin/phpunit
```

## Author
Thiago de oliveira
thiagoinnfo@gmail.com

## License
[MIT](https://choosealicense.com/licenses/mit/)