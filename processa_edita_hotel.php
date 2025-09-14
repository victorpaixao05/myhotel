<?php
session_start();
include 'db.php';

if (!isset($_SESSION['usuario'])) {
    header("Location: index.php?pagina=login&erro=2");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id']);
    $nome_hotel = mysqli_real_escape_string($conexao, $_POST['nome_hotel']);
    $local_hotel = mysqli_real_escape_string($conexao, $_POST['local_hotel']);
    $preco_hotel = floatval($_POST['preco_hotel']);
    $descricao = mysqli_real_escape_string($conexao, $_POST['descricao']);

    $sql = "UPDATE hoteis SET nome_hotel='$nome_hotel', local_hotel='$local_hotel', preco_hotel=$preco_hotel, descricao='$descricao'";

    if (isset($_FILES['foto_hotel']) && $_FILES['foto_hotel']['error'] == UPLOAD_ERR_OK) {
        $pasta_upload = 'uploads/';
        if (!is_dir($pasta_upload)) {
            mkdir($pasta_upload, 0755, true);
        }

        $tmp_name = $_FILES['foto_hotel']['tmp_name'];
        $original_name = basename($_FILES['foto_hotel']['name']);
        $ext = pathinfo($original_name, PATHINFO_EXTENSION);
        $imagem_nome = uniqid('hotel_') . '.' . $ext;
        $destino = $pasta_upload . $imagem_nome;

        if (move_uploaded_file($tmp_name, $destino)) {
            $sql .= ", imagem='$imagem_nome'";
        }
    }

    $sql .= " WHERE id=$id";

    if (mysqli_query($conexao, $sql)) {
        header('Location: index.php?pagina=meushoteis');
        exit;
    } else {
        echo "Erro ao atualizar: " . mysqli_error($conexao);
    }
}
?>
