# Desafio PP

API Backend para realização de transferência.

## Requisitos do sistema

Instale o [ Docker ](https://docs.docker.com/engine/)
e [ Docker Compose](https://docs.docker.com/compose/).

## Instalação

Use o docker-compose [docker](https://pip.pypa.io/en/stable/) para iniciar os containers.

```bash
docker-compose up -d
```
Acesse o container grupozap-php para instalação das dependências do projeto.

```bash
docker exec -it grupozap-php sh
```

Instale as dependências do projeto.

```bash
composer install
```

## Como usar

Você pode fazer requisições na api de duas formas.


Importar o link da collection no postman.

```
https://www.getpostman.com/collections/2f9d84a5693fa8195f22
```

Acessar a url com os parametros, sendo company igual a zap ou vivareal

```
http://localhost/api/properties?company=zap&page=1&limit=20
```

## Tests

Acesse o container grupozap-php.

```bash
docker exec -it grupozap-php sh
```

Execute os testes com o comando abaixo.

```bash
php ./vendor/bin/phpunit tests/ 
```

## Autor
Thiago de oliveira
thiagoinnfo@gmail.com

## License
[MIT](https://choosealicense.com/licenses/mit/)