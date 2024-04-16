<?php
include '../functions.php';
$pdo = pdo_connect_pgsql();
$msg = '';
// Verifica se os dados POST não estão vazios
if (!empty($_POST)) {
    // Se os dados POST não estiverem vazios, insere um novo registro
    // Configura as variáveis que serão inserid_contatoas. Devemos verificar se as variáveis POST existem e, se não existirem, podemos atribuir um valor padrão a elas.
    // Verifica se a variável POST "nome" existe, se não existir, atribui o valor padrão para vazio, basicamente o mesmo para todas as variáveis
    $cpf_cliente = isset($_POST['cpf_cliente']) ? $_POST['cpf_cliente'] : '';
    $codfun = isset($_POST['codfun']) ? $_POST['codfun'] : '';
    $pizza = isset($_POST['pizza']) ? $_POST['pizza'] : '';
    $tamanho_pizza = isset($_POST['tamanho_pizza']) ? $_POST['tamanho_pizza'] : '';
    $cadastro = isset($_POST['cadastro']) ? $_POST['cadastro'] : date('Y-m-d H:i:s');
    // Insere um novo registro na tabela contacts
    $stmt = $pdo->prepare('INSERT INTO pedidos_pizzaria (cpf_cliente, codfun, pizza, tamanho_pizza, cadastro) VALUES (?, ?, ?, ?, ?)');
    $stmt->execute([$cpf_cliente, $codfun, $pizza, $tamanho_pizza, $cadastro]);
    // Mensagem de saída
    $msg = 'Pedido Realizado com Sucesso!';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link href="../css/styleP.css" rel="stylesheet" type="text/css">
</head>

<body>
    <?= header2() ?>
    <div class="content update">
        <h2>Registrar Pedido</h2>
        <form action="createPedido.php" method="post">
            <label for="cpf_cliente">Cpf</label>
            <label for="codfun">Atendido por:</label>
            <input type="text" name="cpf_cliente" placeholder="XXXXXXXXXXX" id_contato="cpf_cliente">
            <input type="text" name="codfun" placeholder="Seu código" id_contato="codfun">
            <label for="pizza">Pizza</label>
            <label for="tamanho_pizza">Tamanho da pizza</label>
            <input type="text" name="pizza" placeholder="Pizza" id_contato="pizza">
            <input type="text" name="tamanho_pizza" placeholder="Tamanho" id_contato="tamanho_pizza">
            <label for="cadastro">Data do Pedido</label>
            <input type="submit" value="Criar">
            <input type="datetime-local" name="Criar" value="<?= date('Y-m-d\TH:i') ?>" id_contato="cadastro">
            <a href="searchPedido.php" class="search-contact">Ver pedidos</a>
        </form>
        <?php if ($msg) : ?>
            <p><?= $msg ?></p>
        <?php endif; ?>
    </div>
</body>

</html>