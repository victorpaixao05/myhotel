<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$db = "bdhotel";
 
$conexao = mysqli_connect ($servidor, $usuario, $senha, $db);
$query = "SELECT *FROM cadastro_hotel";
$consulta_cliente = mysqli_query($conexao, $query);
?>
 
 
<h1>Cadastre seu Hotel:<h1><br>
<form method="post" action="cadastro.php">
    <label>Nome do Proprietário:</label><br>
    <input type="text" name="nome_cadastro" placeholder="Digite o nome do Proprietário">
    <br><br>
    <label>Data de Nascimento:</label><br>
    <input type="text" name="dt_nasc" placeholder="Digite a sua Data de Nascimento">
    <br><br>
    <label>CPf Proprietário:</label><br>
    <input type="text" name="cpf_cadastro" placeholder="Digite o CPF do Proprietário">
    <br><br>
    <label>CNPJ do Hotel:</label><br>
    <input type="text" name="cnpj_cadastro" placeholder="Digite o CNPJ do Proprietário">
    <br><br>
    <label>Nome do Hotel:</label><br>
    <input type="text" name="nome_hotel" placeholder="Digite o nome do Hotel">
    <br><br>
    <label>Cidade Estado do Hotel:</label><br>
    <input type="text" name="cidade_estado" placeholder="Digite a Cidade e Estado do hotel">
    <br><br>
    <label>Descrição:</label><br>
    <input type="text" name="descricao" placeholder="Digite a Descrição">
    <br><br>
    <input type="submit" value="Cadstrar">
</form>
<br><br>
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