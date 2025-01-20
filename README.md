# Configuração do Projeto Laravel com Docker

## Pré-requisitos
- Docker.
- Git.

## Passos para Executar o Projeto

### 1. Clonar o Repositório
Clone o projeto para sua máquina local:
```bash
git clone <link-do-repositorio>
cd <nome-do-repositorio>
```

### 2. Configurar o Ambiente
Copie o arquivo `.env.example` e ajuste as configurações:
```bash
cp .env.example .env
```
Defina as seguintes variáveis conforme necessário no arquivo `.env`:
- **Banco de Dados**: `DB_CONNECTION`, `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`.
- Outras configurações específicas da aplicação.

### 3. Iniciar os Containers
Execute o seguinte comando para iniciar os containers Docker:
```bash
docker compose up -d
```

### 4. Acessar o Container PHP
Entre no container PHP em execução:
```bash
docker exec -it php-laravel bash
```

### 5. Instalar Dependências
Dentro do container, instale as dependências do Laravel:
```bash
composer install
```

### 6. Executar as Migrações do Banco de Dados
Execute as migrações para configurar o esquema do banco de dados:
```bash
php artisan migrate
```
(Opcional) Popule o banco de dados com dados de exemplo:
```bash
php artisan db:seed
```

### 7. Acessar a Aplicação
Acesse a aplicação no navegador:
```
http://localhost:8000
```

## Notas
- Certifique-se de que o arquivo `.env` esteja configurado de acordo com o ambiente local ou de produção.
- Se encontrar problemas, verifique os logs dos containers com `docker logs <nome-do-container>`.

## Licença
Este projeto está licenciado sob [Sua Licença Aqui].
