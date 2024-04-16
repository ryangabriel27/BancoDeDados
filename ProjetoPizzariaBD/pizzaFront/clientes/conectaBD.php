<?php
// endereco
// nome do BD
// usuario
// senha
$endereco = 'localhost';
$banco = 'turmabtarde';
$admin = 'postgres';
$senha = 'postgres';
try {
    // sgbd:host;port;dbname
    // admin
    // senha
    // errmode
    $pdo = new PDO(
        "pgsql:host=$endereco;port=5432;dbname=$banco",
        $admin,
        $senha,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
    $sql = "CREATE TABLE IF NOT EXISTS 
     clientes_pizzaria (
        id_cliente SERIAL PRIMARY KEY,
        nome_cliente VARCHAR(255),
        endereco_cliente VARCHAR(255),
        idade_cliente INT,
        cpf_cliente VARCHAR(255),
        email_cliente VARCHAR(255),
        senha_cliente VARCHAR(255)
    )";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
} catch (PDOException $e) {
    echo "Falha ao conectar ao banco de dados. <br/>";
    die($e->getMessage());
}
