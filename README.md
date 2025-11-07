# 🚗 Clone Carros (Laravel + Breeze)

Este projeto visa recriar um site de vendas de carros (similar a Webmotors/ICarros) usando **Laravel** e **Laravel Breeze** para a estrutura inicial.

## 🚀 Como Configurar e Executar

Siga esta sequência de comandos para configurar o ambiente.

### Pré-requisitos
* PHP e Composer instalados.
* Node.js e NPM instalados.
* Banco de dados configurado no arquivo `.env`.

### Comandos de Setup

Execute os comandos abaixo, *na ordem*, no seu terminal:

1.  **Criar Projeto e Entrar na Pasta:**
    ```bash
    composer create-project laravel/laravel venda_veiculos
    cd venda_veiculos
    ```

2.  **Instalar Breeze (Autenticação):**
    ```bash
    composer require laravel/breeze --dev
    php artisan breeze:install
    # Na instalação, escolha 'blade' para a stack.
    ```

3.  **Instalar e Compilar Assets (Frontend):**
    ```bash
    npm install
    npm run dev 
    # Mantenha este terminal rodando para compilar o CSS/JS.
    ```

4.  **Migrar Banco de Dados:**
    ```bash
    php artisan migrate
    # Garante que as tabelas iniciais (usuários, etc.) sejam criadas.
    ```

5.  **Iniciar o Servidor Local:**
    ```bash
    php artisan serve
    # O projeto estará acessível em [http://127.0.0.1:8000](http://127.0.0.1:8000)
    ```

---
**Nota:** Para desenvolvimento contínuo, você precisa manter o **`npm run dev`** rodando em um terminal e o **`php artisan serve`** rodando em outro.
