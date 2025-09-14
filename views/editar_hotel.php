<?php
if (!isset($_SESSION['usuario'])) {
    header("Location: index.php?pagina=login&erro=2");
    exit;
}

if (!isset($_GET['id'])) {
    echo "<p>Hotel não especificado.</p>";
    exit;
}

$id = intval($_GET['id']);
$sql = "SELECT * FROM hoteis WHERE id = $id";
$result = mysqli_query($conexao, $sql);
$hotel = mysqli_fetch_assoc($result);

if (!$hotel) {
    echo "<p>Hotel não encontrado.</p>";
    exit;
}
?>

<link rel="stylesheet" href="<?= BASE_URL ?>styles/style.css">

<h1>Editar Hotel</h1>
<form method="post" action="processa_edita_hotel.php" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $hotel['id'] ?>">
    
    <label>Nome do Hotel:</label>
    <input type="text" name="nome_hotel" value="<?= htmlspecialchars($hotel['nome_hotel']) ?>" required><br><br>

    <label>Localização:</label>
    <input type="text" name="local_hotel" value="<?= htmlspecialchars($hotel['local_hotel']) ?>" required><br><br>

    <label>Preço da diária:</label>
    <input type="number" step="0.01" name="preco_hotel" value="<?= htmlspecialchars($hotel['preco_hotel']) ?>" required><br><br>

    <label>Descrição:</label>
    <input type="text" name="descricao" value="<?= htmlspecialchars($hotel['descricao']) ?>" required><br><br>

    <button type="submit">Salvar Alterações</button>
</form>
