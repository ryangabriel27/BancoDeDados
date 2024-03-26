<?php
require_once 'conectaBD.php';
// Definir o BD (e a tabela)
// Conectar ao BD (com o PHP)

if (!empty($_POST)) {
    // Está chegando dados por POST e então posso tentar inserir no banco
    // Obter as informações do formulário ($_POST)
    try {
        // Preparar as informações
        // Montar a SQL (pgsql)
        $sql = "INSERT INTO clientes (nome_cliente,endereco_cliente,idade_cliente,cpf_cliente,email_cliente,senha_cliente) VALUES (:nome_cliente, :endereco_cliente, :idade_cliente, :cpf_cliente, :email_cliente,:senha_cliente)";
        // Preparar a SQL (pdo)
        $stmt = $pdo->prepare($sql);
        // Definir/organizar os dados p/ SQL
        $dados = array(
            ':nome_cliente' => $_POST['cNome'],
            ':endereco_cliente' => $_POST['cEndereco'],
            ':idade_cliente' => $_POST['cIdade'],
            ':email_cliente' => $_POST['cEmail'],
            ':cpf_cliente' => $_POST['cCpf'],
            ':senha_cliente' => md5($_POST['cSenha']) //md5 é um padrão de criptografia
        );
        // Tentar Executar a SQL (INSERT)
        // Realizar a inserção das informações no BD (com o PHP)
        if ($stmt->execute($dados)) {
            header("Location: cadastroClientes.php");
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
