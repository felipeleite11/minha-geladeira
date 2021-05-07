# Minha Geladeira

Este projeto implementa um gerenciador de alimentos, incluindo geladeira e dispensa.

## 🚀 Começando

### 📋 Pré-requisitos

- [Wamp](https://www.wampserver.com/en/) ou [Xampp](https://www.apachefriends.org/) - Pacotes que incluem um servidor Apache e um banco de dados MySQL (para ambiente Windows)
- [PHP](https://www.php.net/) - Linguagem de programação para construção de sistemas baseados em ambiente WEB
- [Laravel](https://laravel.com/) - Framework PHP para desenvolvimento de API's e Web Apps
- [Composer](https://getcomposer.org/) - Gerenciador de Dependências para PHP

### 🔧 Instalação

- Clonar o projeto: `git clone https://github.com/felipeleite11/minha-geladeira`
- Executar a instalação das dependências: `composer install`
- Criar um arquivo chamado `.env`, duplicando o arquivo `.env.example`
- Preencher os dados de conexão com a base de dados no arquivo `.env`
- Criar uma base de dados no MySQL local conforme a variável ambiente `DB_DATABASE`, definida em `.env`
- Executar as migrations do projeto com `php artisan migrate`
- Executar a aplicação com `php artisan serve`
- Abrir o endereço `http://localhost:8000` no navegador

## 📦 Desenvolvimento

Alguns dos recursos que foram aplicados:
- Controllers implementados segundo as boas práticas indicadas na documentação oficial do Laravel 8
- Uso do Blade - Template Engine oficial do Laravel
