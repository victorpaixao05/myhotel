<?php 

#iniciar sessão
session_start();

define('BASE_URL', '/testar/');

#Base de dados
include 'db.php';

#Cabeçalho
include 'header.php';


#Conteúdo da página

if(isset($_GET['pagina'])) {
	$pagina = $_GET['pagina'];
} else {
	$pagina = 'home';
}


switch ($pagina) {
	case 'login':
	case 'cadastro':
	case 'criar-conta':
		include "views/$pagina.php";
		break;
	default: include 'views/home.php'; 
	break;
}


#Rodapé
include 'footer.php';