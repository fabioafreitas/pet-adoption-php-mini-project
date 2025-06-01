<?php
require_once __DIR__ . '/validador_login.php';
require_once __DIR__ . '/../backend/usuarios.php';

$usuarios = getUsuarios();

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nome'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $telefone = trim($_POST['telefone'] ?? '');
    if ($nome && $email && $telefone) {
        addUsuario($nome, $email, $telefone);
    }
}

$deleteError = '';
// Handle delete (via GET for simplicity, but POST is safer)
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    if (!deleteUsuario($id)) {
        $deleteError = "Usuário não pode ser excluído porque já adotou pets.";
    }
    header("Location: gestao_usuarios.php");
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="gestao_usuarios.css" />
  </head>
  <body>
    <header>
      <img class="logo" src="assets/logo.svg" alt="" srcset="" />
      <h1>Gestão de Usuários</h1>
      <div class="nav-button-container">
        <a class="button-wrap button-default" href="./gestao_pets.php">Gestão de Pets</a>
        <a class="button-wrap button-default" href="./index.php">Sair</a>
      </div>
    </header>

    <main>
      <!-- CADASTRO DE USUÁRIO -->
      <form
        class="form-container"
        method="post"
        action=""
      >
        <div class="input-section-overlay">
          <span class="cadastro-title">Cadastro de Usuários</span>
          <input type="submit" class="button-wrap button-confirm" value="Cadastrar" />
        </div>
        <div class="input-section-overlay">
          <div class="input-section">
            <span>Nome</span>
            <input type="text" name="nome" required />
          </div>
          <div class="input-section">
            <span>E-mail</span>
            <input type="text" name="email" required />
          </div>
          <div class="input-section">
            <span>Telefone</span>
            <input type="text" name="telefone" required />
          </div>
        </div>
      </form>

      <!-- TABELA DE USUÁRIOS -->
      <table class="border-style">
        <thead>
          <tr>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Telefone</th>
            <th>Ações</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($usuarios as $usuario): ?>
          <tr>
              <td><?= htmlspecialchars($usuario['nome']) ?></td>
              <td><?= htmlspecialchars($usuario['email']) ?></td>
              <td><?= htmlspecialchars($usuario['telefone']) ?></td>
              <td>
                  <a class="button-wrap button-delete" href="?delete=<?= $usuario['id'] ?>" onclick="confirmarDelecao()">Excluir</a>
              </td>
          </tr>
          <?php endforeach; ?>
      </tbody>
      </table>
      <?php if ($deleteError): ?>
        <div class="error-message"><?= $deleteError ?></div>
      <?php endif; ?>
    </main>
    <footer>
      <span>Todos os direitos reservados.</span>
    </footer>
  </body>
  <script>
    function confirmarDelecao() {
      return confirm('Excluir este usuário?');
    }
  </script>
  <?php if (!empty($deleteError)): ?>
    <script>
      alert('<?= addslashes($deleteError) ?>');
    </script>
    <?php endif; ?>
</html>