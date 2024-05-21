<?php
include '../functions.php';
$pdo = pdo_connect_pgsql();
$msg = '';
// Verifica se os dados POST não estão vazios
if (!empty($_POST)) {
    // Se os dados POST não estiverem vazios, insere um novo registro
    // Configura as variáveis que serão inserid_contatoas. Devemos verificar se as variáveis POST existem e, se não existirem, podemos atribuir um valor padrão a elas.
    // Verifica se a variável POST "nome" existe, se não existir, atribui o valor padrão para vazio, basicamente o mesmo para todas as variáveis
    $nome = isset($_POST['nome']) ? $_POST['nome'] : '';
    $sobrenome = isset($_POST['sobrenome']) ? $_POST['sobrenome'] : '';
    $cnh = isset($_POST['cnh']) ? $_POST['cnh'] : '';
    $telefone = isset($_POST['telefone']) ? $_POST['telefone'] : '';
    $cidade = isset($_POST['cidade']) ? $_POST['cidade'] : '';
    $estado = isset($_POST['estado']) ? $_POST['estado'] : '';
    $endereco = isset($_POST['endereco']) ? $_POST['endereco'] : '';
    $id_pagamento = isset($_POST['id_pagamento']) ? $_POST['id_pagamento'] : '';
    // Insere um novo registro na tabela contacts
    try {
        $stmt = $pdo->prepare('INSERT INTO clientes (nome, sobrenome, cnh, telefone, cidade, estado, endereco, id_pagamento) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
        $stmt->execute([$nome, $sobrenome, $cnh, $telefone, $cidade, $estado, $endereco, $id_pagamento]);
    } catch (Exception $e) {
        $msg = $e;
    }

    // Mensagem de saída
    $msg = 'Cliente cadastrado com Sucesso!';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?= template_head2("Cadastro") ?>
    <link rel="stylesheet" href="../css/styleCadastro.css">
</head>

<body>
    <?= template_header2() ?>
    <?= voltar("indexCliente.php") ?>
    <div class="content update">
        <h1 class="text-center">Cadastrar cliente</h1>
        <form action="cadastroCliente.php" method="POST">
            <div class="form-group">
                <label for="cadastro">Nome:</label>
                <label for="usuario">Sobrenome:</label>
            </div>
            <div class="form-group">
                <input type="text" name="nome" id="nome" placeholder="Nome" required>
                <input type="text" name="sobrenome" placeholder="sobrenome" id="sobrenome" required>
            </div>
            <div class="form-group">
                <label for="nome_completo">CNH:</label>
                <label for="usuario">Telefone:</label>
            </div>
            <div class="form-group">
                <input type="text" name="cnh" placeholder="cnh" id="cnh" required>
                <input type="text" name="telefone" placeholder="telefone" id="telefone" required>
            </div>
            <div class="form-group">
                <label for="cidade">Cidade:</label>
                <label for="cel">Estado:</label>
            </div>
            <div class="form-group">
                <input type="text" name="cidade" placeholder="cidade" id="cidade" required>
                <input type="text" name="estado" placeholder="estado" id="estado" required>
            </div>
            <div class="form-group">
                <label for="cadastro">Endereço:</label>
            </div>
            <div class="form-group">
                <input type="text" name="endereco" id="endereco" placeholder="endereco">
            </div>
            <div class="form-group">
                <input type="submit" value="Cadastrar">
                <a href="cadastroPagamento.php">
                    <p>Cadastrar pagamento</p>
                </a>
            </div>
        </form>
    </div>
    <?= template_footer() ?>
</body>

</html>