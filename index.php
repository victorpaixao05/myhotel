<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$db = "bdhotel";
 
$conexao = mysqli_connect ($servidor, $usuario, $senha, $db);
$query = "SELECT *FROM cadastro_hotel";
$consulta_cliente = mysqli_query($conexao, $query);
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Cadastro de Hotel</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #fff;
      margin: 0;
      padding: 0;
    }

    .container {
      width: 90%;
      margin: 30px auto;
      display: flex;
      justify-content: space-between;
      align-items: flex-start;
    }

    .form-group {
      margin-bottom: 15px;
    }

    label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
    }

    input[type="text"],
    input[type="date"],
    input[type="number"],
    input[type="file"] {
      width: 220px;
      padding: 8px;
      border: 1px solid #000;
      border-radius: 15px;
    }

    .column {
      display: flex;
      flex-direction: column;
      gap: 20px;
    }

    .logo {
      display: flex;
      align-items: center;
      gap: 10px;
      margin: 30px;
    }

    .logo img {
      width: 40px;
    }

    .upload-section {
      text-align: center;
    }

    .upload-box {
      width: 250px;
      height: 250px;
      background-color: #e0e0e0;
      border: 2px dashed #999;
      display: flex;
      align-items: center;
      justify-content: center;
      margin-top: 10px;
    }

    .button {
      margin-top: 30px;
      display: flex;
      justify-content: center;
    }

    button {
      background-color: #0099e5;
      color: white;
      border: none;
      padding: 12px 40px;
      font-size: 16px;
      border-radius: 6px;
      cursor: pointer;
    }

    button:hover {
      background-color: #007acc;
    }

  </style>
</head>
<body>

  <div class="logo">
    <img src="myhotel\imagens\logo_myhotel.png" alt="logo">
    <h2>MY HOTEL</h2>
  </div>

  <form action="cadastrar.php" method="POST" enctype="multipart/form-data">
    <div class="container">

      <div class="column">
        <div class="form-group">
          <label>Digite seu Nome:</label>
          <input type="text" name="nome_cadastro" required>
        </div>

        <div class="form-group">
          <label>Digite sua Data de Nascimento:</label>
          <input type="date" name="dt_nasc" required>
        </div>

        <div class="form-group">
          <label>Digite seu CPF:</label>
          <input type="text" name="cpf_cadastro" required>
        </div>

        <div class="form-group">
          <label>Digite o CNPJ do hotel:</label>
          <input type="text" name="cnpj_cadastro" required>
        </div>
      </div>

      <div class="column">
        <div class="form-group">
          <label>Digite o nome do hotel:</label>
          <input type="text" name="nome_hotel" required>
        </div>

        <div class="form-group">
          <label>Digite a cidade/estado:</label>
          <input type="text" name="local_hotel" required>
        </div>

        <div class="form-group">
          <label>Digite a descrição do hotel:</label>
          <input type="text"  name="preco_hotel" required>
        </div>
      </div>

      <div class="upload-section">
        <label>Envie fotos do Hotel:</label>
        <div class="upload-box">
          <input type="file" name="fotos[]" accept="image/*" multiple>
        </div>
      </div>
    </div>

    <div class="button">
      <button type="submit">CADASTRAR</button>
    </div>
  </form>
  <table>
    <thead>
        <tr>
            <th>Nome do Cliente</th>
            <th>Data de Nascimento</th>
            <th>CPF Proprietário</th>
            <th>CNPJ Hotel</th>
            <th>Nome Hotel</th>]
            <th>Cidade Estado do Hotel</th>
            <th>Descrição</th>
            <th>ID do Cadastro</th>
        </tr>
    </thead>
    <tbody>
    <?php
        while($linha = mysqli_fetch_array($consulta_cliente)){
        echo '<tr>';
            echo '<td>'.$linha['nome_cadastro'].'</td>';
            echo '<td>'.$linha['dt_nasc'].'</td>';
            echo '<td>'.$linha['cpf_cadastro'].'</td>';
            echo '<td>'.$linha['cnpj_cadastro'].'</td>';
            echo '<td>'.$linha['nome_hotel'].'</td>';
            echo '<td>'.$linha['cidade_estado'].'</td>';
            echo '<td>'.$linha['descricao'].'</td>';
            echo '<td>'.$linha['id_cadastro'].'</td>';
        echo'</tr>';
        }
    ?>
    </tbody>
</table>

</body>
</html>
