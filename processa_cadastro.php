<?php
session_start();

include 'db.php'; 

if (!isset($_SESSION['usuario'])) {
    header("Location: index.php?pagina=login&erro=2");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = mysqli_real_escape_string($conexao, $_POST['nome'] ?? '');
    $data_nascimento = mysqli_real_escape_string($conexao, $_POST['data_nascimento'] ?? '');
    $documento = mysqli_real_escape_string($conexao, $_POST['documento'] ?? '');
    $nome_hotel = mysqli_real_escape_string($conexao, $_POST['nome_hotel'] ?? '');
    $local_hotel = mysqli_real_escape_string($conexao, $_POST['local_hotel'] ?? '');
    $preco_hotel = floatval($_POST['preco_hotel'] ?? 0);
    $descricao = mysqli_real_escape_string($conexao, $_POST['descricao_hotel'] ?? '');

    $imagem_nome = null;

    if (isset($_FILES['foto_hotel']) && $_FILES['foto_hotel']['error'][0] == UPLOAD_ERR_OK) {
        $pasta_upload = 'uploads/';
        if (!is_dir($pasta_upload)) {
            mkdir($pasta_upload, 0755, true);
        }

        $tmp_name = $_FILES['foto_hotel']['tmp_name'][0];
        $original_name = basename($_FILES['foto_hotel']['name'][0]);
        $ext = pathinfo($original_name, PATHINFO_EXTENSION);

        $imagem_nome = uniqid('hotel_') . '.' . $ext;

        $destino = $pasta_upload . $imagem_nome;

        if (!move_uploaded_file($tmp_name, $destino)) {
            die("Falha ao mover arquivo.");
        }
    }

    $sql = "INSERT INTO hoteis (nome, data_nascimento, documento, nome_hotel, local_hotel, preco_hotel, descricao, imagem) VALUES ('$nome', '$data_nascimento', '$documento', '$nome_hotel', '$local_hotel', $preco_hotel, '$descricao', ";

    if ($imagem_nome) {
        $sql .= "'$imagem_nome')";
    } else {
        $sql .= "NULL)";
    }

    if (mysqli_query($conexao, $sql)) {
        header("Location: index.php?pagina=meushoteis");
        exit;
    } else {
        die("Erro ao inserir no banco: " . mysqli_error($conexao));
    }
} else {
    die("Método inválido");
}
