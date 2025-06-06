# pet-adoption-php-mini-project

Projeto didático para ensinar minha irmã em uma atividade de ADS

## Instruções para rodar o projeto no XAMPP

1. **Inicie o XAMPP**

   - Abra o painel de controle do XAMPP.

2. **Inicie o Apache**

   - No painel do XAMPP, clique em "Start" ao lado de "Apache".

3. **Inicie o MySQL**

   - No painel do XAMPP, clique em "Start" ao lado de "MySQL".

4. **Crie o banco de dados**

   - Abra o navegador e acesse: [http://localhost/phpmyadmin](http://localhost/phpmyadmin)
   - Clique em "Novo" e crie um banco de dados chamado **banco_pets**.

5. **Importe o script SQL**

   - Com o banco **banco_pets** selecionado, clique em "Importar".
   - Selecione o arquivo `database/banco_de_dados.sql` do projeto.
   - Clique em "Executar" para criar as tabelas e popular os dados.

6. **Copie os arquivos do projeto**

   - Copie todos os arquivos e pastas do projeto para a pasta `htdocs` do XAMPP (exemplo: `C:\xampp\htdocs\teste`).

7. **Abra o projeto no navegador**
   - No navegador, acesse: [http://localhost/teste/frontend/login.php](http://localhost/teste/frontend/login.php) ou o arquivo inicial do projeto.

Pronto! O projeto estará rodando localmente no seu XAMPP.

## Instruções para rodar o projeto em um servidor web (ex: InfinityFree.com)

### 1. Criar ambiente de deploy no InfinityFree.com

- Acesse [https://infinityfree.com](https://infinityfree.com) e crie uma conta gratuita.
- Após o cadastro, crie um novo site/domínio gratuito pelo painel.

### 2. Criar banco de dados MySQL

- No painel do InfinityFree, vá em "MySQL Databases".
- Crie um novo banco de dados e anote:
  - Nome do banco de dados
  - Nome de usuário do banco
  - Senha do banco
  - Host do banco (geralmente algo como `sqlXXX.infinityfree.com`)

### 3. Subir dados do banco de dados

- No painel, acesse "phpMyAdmin" para o banco criado.
- Importe o arquivo `database/banco_de_dados.sql` do projeto para criar as tabelas e dados.

### 4. Abrir servidor FTP do ambiente criado

- No painel do InfinityFree, acesse "FTP Details" para obter:
  - Host FTP
  - Usuário FTP
  - Senha FTP

### 5. Subir arquivos do projeto via FTP

- Use um cliente FTP (ex: FileZilla).
- Conecte-se usando os dados do passo anterior.
- Envie os seguintes arquivos e pastas para o diretório `/htdocs`:
  - O arquivo `index.php` da raiz do projeto
  - As pastas `/frontend` e `/backend` completas

### 6. Editar credenciais do banco de dados

- No servidor, edite o arquivo `backend/db.php` e coloque as credenciais do banco criadas no InfinityFree:

```php
// ...inicio do código...
$host = 'HOST_DO_BANCO';
$db   = 'NOME_DO_BANCO';
$user = 'USUARIO_DO_BANCO';
$pass = 'SENHA_DO_BANCO';
// ...restante do código...
```

### 7. Acessar o projeto

- No navegador, acesse o domínio fornecido pelo InfinityFree (ex: `http://seusite.infinityfreeapp.com`)
- O projeot estará disponível para uso online
