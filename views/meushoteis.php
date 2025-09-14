<?php


if (!isset($_SESSION['usuario'])) {
    header("Location: index.php?pagina=login&erro=2");
    exit;
}

$host = 'localhost';
$db   = 'myhotel';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

try {
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
} catch (PDOException $e) {
    die("Erro na conexão com banco: " . $e->getMessage());
}

$sql = "SELECT * FROM hoteis ORDER BY id DESC";
$stmt = $pdo->query($sql);
$hoteis = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<link rel="stylesheet" href="<?= BASE_URL ?>styles/style.css">

<h1>Meus Hotéis Cadastrados</h1>

<div class="lista-hoteis">
    <?php if (count($hoteis) === 0): ?>
        <p>Nenhum hotel cadastrado ainda.</p>
    <?php else: ?>
        <?php foreach ($hoteis as $hotel): ?>
            <div class="hotel-card">
                <h2><?= htmlspecialchars($hotel['nome_hotel']) ?></h2>
                <p><strong>Localização:</strong> <?= htmlspecialchars($hotel['local_hotel']) ?></p>
                <p><strong>Preço da diária:</strong> R$ <?= number_format($hotel['preco_hotel'], 2, ',', '.') ?></p>
                <p><strong>Descrição:</strong> <?= htmlspecialchars($hotel['descricao']) ?></p>
                <p><strong>Responsável:</strong> <?= htmlspecialchars($hotel['nome']) ?> (<?= htmlspecialchars($hotel['documento']) ?>)</p>
                <p><strong>Data de Nascimento:</strong> <?= date('d/m/Y', strtotime($hotel['data_nascimento'])) ?></p>

                <?php if ($hotel['imagem']): ?>
                    <img src="uploads/<?= htmlspecialchars($hotel['imagem']) ?>" alt="Foto do hotel" style="max-width:300px;">
                <?php endif; ?>

                <div class="acoes-card">
                    <a class="btn-editar" href="?pagina=editar_hotel&id=<?= $hotel['id'] ?>">Editar</a>
                    <a class="btn-deletar" href="processa_deleta_hotel.php?id=<?= $hotel['id'] ?>" onclick="return confirm('Deseja realmente excluir este hotel?')">Deletar</a>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

