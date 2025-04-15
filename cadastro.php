<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$db = "bdhotel";
 
$conexao = mysqli_connect($servidor, $usuario, $senha, $db);
 
$a = $_POST["nome_cadastro"];
$b = $_POST["dt_nasc"];
$c = $_POST["cpf_cadastro"];
$d = $_POST["cnpj_cadastro"];
$e = $_POST["nome_hotel"];
$f = $_POST["cidade_estado"];
$g = $_POST["descricao"];
$query = "INSERT INTO cadastro_hotel (nome_cadastro, dt_nasc, cpf_cadastro, cnpj_cadastro, nome_hotel, cidade_estado, descricao)
            VALUES('$a', '$b', '$c', '$d', '$e', '$f', '$g')";
 
mysqli_query($conexao, $query);
 
header('location: index.php');