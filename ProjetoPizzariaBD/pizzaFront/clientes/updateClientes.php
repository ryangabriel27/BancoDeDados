<?php
include '../functions.php';
$pdo = pdo_connect_pgsql();
$msg = '';
// Verifica se o ID do contato existe, por exemplo, update.php?id=1 irá obter o contato com o id 1
if (isset($_GET['id_cliente'])) {
    if (!empty($_POST)) {
        // Esta parte é semelhante ao create.php, mas aqui estamos atualizando um registro e não inserindo
        $nome = isset($_POST['nome_cliente']) ? $_POST['nome_cliente'] : '';
        $cpf_cliente = isset($_POST['cpf_cliente']) ? $_POST['cpf_cliente'] : '';
        $email = isset($_POST['email_cliente']) ? $_POST['email_cliente'] : '';
        $endereco_cliente = isset($_POST['endereco_cliente']) ? $_POST['endereco_cliente'] : '';
        $idade_cliente = isset($_POST['idade_cliente']) ? $_POST['idade_cliente'] : '';
        // Atualiza o registro
        $stmt = $pdo->prepare('UPDATE clientes_pizzaria SET nome_cliente = ?, cpf_cliente = ?, email_cliente = ?, endereco_cliente = ?, idade_cliente = ? WHERE id_cliente = ?');
        $stmt->execute([$nome, $cpf_cliente, $email, $endereco_cliente, $idade_cliente, $_GET['id_cliente']]);
        $msg = 'Atualização Realizada com Sucesso!';
    }
    // Obter o contato da tabela contatoss
    $stmt = $pdo->prepare('SELECT * FROM clientes_pizzaria WHERE id_cliente = ?');
    $stmt->execute([$_GET['id_cliente']]);
    $contatos = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$contatos) {
        exit('Pedido Não Localizado!');
    }
} else {
    exit('Nenhum Pedido Especificada!');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/styleP.css">
</head>
<body>
<?=header2()?>

<div class="content update">
	<h2>Atualizar Cliente - <?=$contatos['id_cliente']?></h2>
    <form action="updateClientes.php?id_cliente=<?=$contatos['id_cliente']?>" method="post">
        <label for="id_cliente">ID</label>
        <label for="nome">Nome</label>  
        <input type="text" name="id_cliente" placeholder="" value="<?=$contatos['id_cliente']?>" id="id_cliente" readonly>
        <input type="text" name="nome_cliente" placeholder="Seu Nome" value="<?=$contatos['nome_cliente']?>" id="nome_cliente">
        <label for="cpf">cpf</label>
        <label for="cel">email</label>
        <input type="text" name="cpf_cliente" placeholder="XXXXXXXXXXX" value="<?=$contatos['cpf_cliente']?>" id="cpf_cliente">
        <input type="text" name="email_cliente" placeholder="seuemail@provedor.com" value="<?=$contatos['email_cliente']?>" id="email_cliente">
        <label for="pizza">Endereço</label>
        <label for="created">Idade</label>
        <input type="text" name="endereco_cliente" placeholder="endereco_cliente" value="<?=$contatos['endereco_cliente']?>" id="endereco_cliente">
        <input type="text" name="idade_cliente" value="<?=$contatos['idade_cliente']?>" id="idade_cliente">
        <input type="submit" value="Update">
        <a href="searchClientes.php" class="create-contact">Voltar</a>
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>
</body>
</html>




<?=template_footer()?>