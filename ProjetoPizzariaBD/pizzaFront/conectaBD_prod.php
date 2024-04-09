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
     produtos_pizzaria (
        id_produto SERIAL PRIMARY KEY,
        nome_produto VARCHAR(255),
        categoria_produto VARCHAR(255),
        ingredientes VARCHAR(255),
        valor_produto DECIMAL(7,2),
        tamanho VARCHAR(255),
        borda VARCHAR(255)
    )";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
} catch (PDOException $e) {
    echo "Falha ao conectar ao banco de dados. <br/>";
    die($e->getMessage());
}
