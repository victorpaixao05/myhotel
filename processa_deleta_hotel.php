<?php
session_start();
include 'db.php';

if (!isset($_SESSION['usuario'])) {
    header("Location: index.php?pagina=login&erro=2");
    exit;
}

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "DELETE FROM hoteis WHERE id = $id";
    mysqli_query($conexao, $sql);
}

header('Location: index.php?pagina=meushoteis');
exit;
?>
