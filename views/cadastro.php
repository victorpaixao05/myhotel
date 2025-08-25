<?php

if (!isset($_SESSION['usuario'])) {
    header("Location: index.php?pagina=login&erro=2");
    exit;
}
?>

<link rel="stylesheet" href="<?= BASE_URL ?>styles/style.css">

<div id="mensagem-sucesso" class="alert-success" style="display: none;">
  Hotel cadastrado com sucesso!
</div>



<div class="cadastro-container">
  <div class="cadastro-form-section">

    <form id="form-cadastro" method="POST" action="processa_cadastro.php" enctype="multipart/form-data">
      <div class="cadastro-grid-form">
        <div class="cadastro-form-group">
          <label for="nome">Digite seu Nome:</label>
          <input type="text" id="nome" name="nome" required>
        </div>

        <div class="cadastro-form-group">
          <label for="data_nascimento">Digite sua Data de Nascimento:</label>
          <input type="date" id="data_nascimento" name="data_nascimento" required>
        </div>

        <div class="cadastro-form-group">
          <label for="documento">Digite seu CNPJ ou seu CPF:</label>
          <input type="text" id="documento" name="documento" required>
        </div>

        <div class="cadastro-form-group">
          <label for="nome_hotel">Digite o nome do Hotel:</label>
          <input type="text" id="nome_hotel" name="nome_hotel" required>
        </div>

        <div class="cadastro-form-group">
          <label for="local_hotel">Digite a localidade do Hotel:</label>
          <input type="text" id="local_hotel" name="local_hotel" required>
        </div>

        <div class="cadastro-form-group">
          <label for="preco_hotel">Digite o preço da diária (em reais):</label>
          <input type="number" step="0.01" id="preco_hotel" name="preco_hotel" required>
        </div>

        <div class="cadastro-form-group">
          <label for="descricao_hotel">Digite a descrição do hotel</label>
          <input type="text" id="descricao_hotel" name="descricao_hotel" required>
        </div>

        <button class="cadastro-btn-submit" type="submit">Cadastrar</button>
      </div>
    </form>
  </div>

  <div class="cadastro-right-section">
    <p><strong>Envie fotos do Hotel:</strong></p>
    <div class="cadastro-upload-box">
        <label for="upload-foto" class="custom-upload-button">Escolher arquivos</label>
        <input type="file" id="upload-foto" name="foto_hotel[]" multiple accept="image/*">
        <span id="file-chosen">Nenhum arquivo escolhido</span>
    </div>
  </div>
</div>

<script>
  const uploadInput = document.getElementById("upload-foto");
  const fileChosen = document.getElementById("file-chosen");

  uploadInput.addEventListener("change", function () {
    if (uploadInput.files.length > 0) {
      const names = Array.from(uploadInput.files).map(file => file.name).join(', ');
      fileChosen.textContent = names;
    } else {
      fileChosen.textContent = "Nenhum arquivo escolhido";
    }
  });
</script>
