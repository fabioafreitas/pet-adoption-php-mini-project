<?php
require_once __DIR__ . '/validador_login.php';
require_once __DIR__ . '/../backend/pets.php';
require_once __DIR__ . '/../backend/usuarios.php';

$usuarios = getUsuarios();
$pets = getPets();

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nome'] ?? '');
    $raca = trim($_POST['raca'] ?? '');
    $urlFoto = trim($_POST['url_foto'] ?? '');
    if ($nome && $raca && $urlFoto) {
        addPet($nome, $raca, $urlFoto);
    }
}

// Handle delete (via GET for simplicity, but POST is safer)
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    deletePet($id);
}


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['adopt_pet_id'], $_POST['usuario_id'])) {
    $petId = intval($_POST['adopt_pet_id']);
    $usuarioId = intval($_POST['usuario_id']);
    if ($petId && $usuarioId) {
        adotarPet($petId, $usuarioId);
        header("Location: gestao_pets.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="gestao_pets.css" />
  </head>

  <!-- Modal para adoção de pet -->
  <div id="adoptModal" class="adoption-modal">
    <form method="post" class="adoption-form">
      <div style="margin-bottom:1rem;">
        <strong>Nome do Pet:</strong> <span id="adopt_pet_nome"></span>
      </div>
      <input type="hidden" name="adopt_pet_id" id="adopt_pet_id" />
      <label for="usuario_id">Escolha o usuário:</label>
      <select name="usuario_id" id="usuario_id" required>
        <option value="">Selecione...</option>
        <?php foreach ($usuarios as $usuario): ?>
          <option value="<?= $usuario['id'] ?>"><?= htmlspecialchars($usuario['nome']) ?></option>
        <?php endforeach; ?>
      </select>
      <br><br>
      <div class="pet-buttons">
        <button type="submit" class="button-wrap button-confirm">Adotar</button>
        <button type="button" class="button-wrap button-default" onclick="closeAdoptModal()">Cancelar</button>
      </div>
    </form>
  </div>
  
  <!-- Contaúdo principal -->
  <body>
    <header>
      <img class="logo" src="assets/logo.svg" alt="" srcset="" />
      <h1>Gestão de Pets</h1>
      <div class="nav-button-container">
        <a class="button-wrap button-default" href="./gestao_usuarios.php"
          >Gestão Usuários</a
        >
        <a class="button-wrap button-default" href="./index.php">Sair</a>
      </div>
    </header>

    <main>
      <!-- CADASTRO DE PET -->
      <form
        class="form-container"
        method="post"
        action=""
      >
        <div class="input-section-overlay">
          <span class="cadastro-title">Cadastro de Pets</span>
          <input
            type="submit"
            class="button-wrap button-confirm"
            value="Cadastrar"
          />
        </div>
        <div class="input-section-overlay">
          <div class="input-section">
            <span>Nome</span>
            <input type="text" name="nome" required />
          </div>
          <div class="input-section">
            <span>Raca</span>
            <input type="text" name="raca" required />
          </div>
          <div class="input-section">
            <span>Url Foto</span>
            <input type="text" name="url_foto" required />
          </div>
        </div>
      </form>

      <!-- CONTAINER DOS PETS -->
      <div class="pets-container">
        <?php foreach ($pets as $pet): ?>
          <div class="pet-card">
            <img class="pet-image" src="<?= htmlspecialchars($pet['pet_foto_url']) ?>" alt="" />
            <div class="pet-texts">
              <div><strong>Tutor:</strong><span><?= htmlspecialchars($pet['tutor_nome']) ?></span></div>
              <div><strong>Nome:</strong><span><?= htmlspecialchars($pet['pet_nome']) ?></span></div>
              <div><strong>Raca:</strong><span><?= htmlspecialchars($pet['pet_raca']) ?></span></div>
            </div>
            <div class="pet-buttons">
              <a class="button-wrap button-confirm" href="#" onclick="openAdoptModal(<?= $pet['pet_id'] ?>, '<?= htmlspecialchars($pet['pet_nome'], ENT_QUOTES) ?>'); return false;">Adotar</a>
              <a class="button-wrap button-delete" href="?delete=<?= $pet['pet_id'] ?>" onclick="confirmarDelecao()">Deletar</a>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </main>
    <footer>
      <span>Todos os direitos reservados.</span>
    </footer>
  </body>
  <script>
    function confirmarDelecao() {
      return confirm('Excluir este pet do banco de dados?');
    }
    function confirmarAdocao() {
      return confirm('Registrar adoção deste pet?');
    }
    function openAdoptModal(petId, petNome) {
      document.getElementById('adopt_pet_id').value = petId;
      document.getElementById('adopt_pet_nome').textContent = petNome;
      document.getElementById('adoptModal').classList.add('active');
    }
    function closeAdoptModal() {
      document.getElementById('adoptModal').classList.remove('active');
    }
  </script>
</html>