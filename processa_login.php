<?php
session_start(); 

include 'db.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email_login'] ?? '';
    $senha = $_POST['senha_login'] ?? '';


    $sql = "SELECT * FROM login WHERE email_login = '$email' AND senha = '$senha'";
    $result = mysqli_query($conexao, $sql); 

    if (mysqli_num_rows($result) === 1) {
        $_SESSION['usuario'] = $email;
        header("Location: index.php?pagina=home"); 
        exit;
    } else {
        header("Location: index.php?pagina=login&erro=1"); 
        exit;
    }
}
