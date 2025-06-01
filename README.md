# Instruções para rodar o projeto no XAMPP

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
