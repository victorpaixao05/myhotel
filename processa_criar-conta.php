<?php
// Configurações do banco
$servidor = "localhost";
$usuario = "root";
$senha = "";
$db = "myhotel";

try {
    $pdo = new PDO("mysql:host=$servidor;dbname=$db;charset=utf8mb4", $usuario, $senha);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $_POST['email_login'] ?? '';
        $senha_login = $_POST['senha_login'] ?? '';

        // Validações simples
        if (empty($email) || empty($senha_login)) {
            echo "<div class='alert'>Por favor, preencha todos os campos.</div>";
        } else {
            // Verifica se o email já existe
            $stmt = $pdo->prepare("SELECT COUNT(*) FROM login WHERE email_login = ?");
            $stmt->execute([$email]);
            $exists = $stmt->fetchColumn();

            if ($exists) {
                echo "<div class='alert'>Esse email já está cadastrado.</div>";
            } else {
                // Insere o novo usuário (sem hash pra manter padrão atual)
                $stmt = $pdo->prepare("INSERT INTO login (email_login, senha) VALUES (?, ?)");
                $stmt->execute([$email, $senha_login]);

                // Redireciona para login após cadastro
                header("Location: index.php?pagina=login");
                exit;
            }
        }
    }
} catch (PDOException $e) {
    echo "Erro no banco de dados: " . $e->getMessage();
}
?>
