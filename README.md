# Desafio PP

Transferência entre contas.

## Requisitos do sistema

Instale o [ Docker ](https://docs.docker.com/engine/)
e [ Docker Compose](https://docs.docker.com/compose/).

## Instalação

Clone o repositório

```bash
git clone https://github.com/thiagoinnfo/desafio-pp
```

Renomear .env.example para .env.

```bash
cp .env.example .env
```

Inicie os contaneirs

```bash
docker-compose up -d
```
Instalar as dependências usando o composer.

```bash
docker exec -ti pp-app composer install
```

Execute as migrations

```bash
docker exec -ti pp-app php artisan migrate
```

Executar os seeds

```bash
 docker exec -ti pp-app php artisan db:seed
```

## Como usar

Importar o link da collection no postman.

```
https://www.getpostman.com/collections/8321f250a8e346012d19
```

## Tests

Executar os tests.

```bash
docker exec -ti pp-app ./vendor/bin/phpunit
```

## Autor
Thiago de oliveira
thiagoinnfo@gmail.com

## License
[MIT](https://choosealicense.com/licenses/mit/)