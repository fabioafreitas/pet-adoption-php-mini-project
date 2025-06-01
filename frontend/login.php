<?php

require_once __DIR__ . '/../backend/admins.php';

$loginError = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email'], $_POST['senha'])) {
    $email = trim($_POST['email']);
    $senha = trim($_POST['senha']);

    if (validarLoginAdmin($email, $senha)) {
        // Login successful, redirect or set session
        session_start();
        $_SESSION['email']=$email;
        header('Location: gestao_usuarios.php');
        exit;
    } else {
        $loginError = 'E-mail ou senha inválidos.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="login.css" />
  </head>
  <body>
    <header>
      <img class="logo" src="assets/logo.svg" alt="" srcset="" />
      <a class="button-wrap button-default" href="./index.php">Página Inicial</a>
    </header>

    <main>
      <div class="container">
        <span>Login</span>
        <form method="post" action="">
          <input type="text" name="email" placeholder="E-mail" required />
          <input type="password" name="senha" placeholder="Senha" required />
          <input class="button-wrap button-default" type="submit" value="Entrar" />
        </form>
        <?php if ($loginError): ?>
          <div style="color: red;"><?= htmlspecialchars($loginError) ?></div>
        <?php endif; ?>
      </div>
    </main>
    <footer>
      <span>Todos os direitos reservados.</span>
    </footer>
  </body>
</html>
