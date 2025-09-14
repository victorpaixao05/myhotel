<?php 
session_start();

define('BASE_URL', '/testar/');

# Base de dados
include 'db.php';

# Cabeçalho
include 'header.php';

# Conteúdo da página
$pagina = $_GET['pagina'] ?? 'home';

switch ($pagina) {
    case 'login':
    case 'cadastro':
    case 'criar-conta':
    case 'meushoteis':
    case 'editar_hotel':
        include "views/$pagina.php";
        break;

    default:
        include 'views/home.php'; 
        break;
}

# Rodapé
include 'footer.php';
?>
