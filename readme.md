<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Sobre o projeto

Este projeto é apenas um teste proposto por uma empresa, ao qual desenvolvi para participar o processo seletivo.

## Instalação

Faça o clone do projeto.

Rodar o comando para instalar as dependências php.

```php
composer install
```

Copiar o conteúdo do arquivo .env.example e criar um novo arquivo chamado .env e colar o conteúdo nele.

Setar as credencias do banco de dados nas defines DB_DATABASE, DB_USERNAME e DB_PASSWORD do arquivo .env

Rodar o comando para gerar a key do projeto.

```php
php artisan key:generate
```
Rodar as migrations, basta usar o comando:

```php
php artisan migrate
``` 
Caso queira criar os dados de teste, basta rodar o comando:

```php
php artisan db:seed
``` 

E por fim, rodar o comando para startar o servidor:

```php
php artisan serve
``` 
ou

```php
php -S localhost:8000 -t public/
```

No navegador, digite: localhost:8000/admin

Obrigado.