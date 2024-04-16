<?php
require_once 'conectaBD_prod.php';
// Definir o BD (e a tabela)
// Conectar ao BD (com o PHP)
if (!empty($_POST)) {
    // Está chegando dados por POST e então posso tentar inserir no banco
    // Obter as informações do formulário ($_POST)
    try {
        // Preparar as informações
        // Montar a SQL (pgsql)
        $sql = "INSERT INTO produtos_pizzaria (nome_produto, categoria_produto, ingredientes, valor_produto, tamanho, borda) VALUES (:nome_produto, :categoria_produto, :ingredientes, :valor_produto, :tamanho, :borda)";
        // Preparar a SQL (pdo)
        $stmt = $pdo->prepare($sql);
        // Definir/organizar os dados p/ SQL
        $dados = array(
            ':nome_produto' => $_POST['cNome'],
            ':categoria_produto' => $_POST['cCategoria'],
            ':ingredientes' => $_POST['cIngr'],
            ':valor_produto' => $_POST['cValor'],
            ':tamanho' => $_POST['cTamanho'],
            ':borda' => $_POST['cBorda']
        );
        // Tentar Executar a SQL (INSERT)
        // Realizar a inserção das informações no BD (com o PHP)
        if ($stmt->execute($dados)) {
            header("Location: cadastroProduto.php");
        }
    } catch (PDOException $e) {
        //die($e->getMessage());
        printf($e);
    }
} else {
    printf("erro");
}
die();
    // Redirecionar para a página inicial (login) c/ mensagem erro/sucesso

?>