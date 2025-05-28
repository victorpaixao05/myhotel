<link rel="stylesheet" href="<?= BASE_URL ?>styles/style.css">

  <div class="login-container">
    <img class="profile" src="https://cdn-icons-png.flaticon.com/512/149/149071.png" alt="User Icon">

    <form method="post" action="../testar/processa_criar-conta.php">
      <div class="input-group">
        <img src="https://cdn-icons-png.flaticon.com/512/1077/1077114.png" alt="User Icon">
        <input type="email" name="email_login" placeholder="Digite seu email" required>
      </div>

      <div class="input-group">
        <img src="https://cdn-icons-png.flaticon.com/512/3064/3064155.png" alt="Password Icon">
        <input type="password" name="senha_login" placeholder="Digite sua senha" required>
      </div>

      <button type="submit">Cadastrar</button>
    </form>

    <a href="?pagina=login" class="back-link">Já tem conta? Faça login</a>
  </div>