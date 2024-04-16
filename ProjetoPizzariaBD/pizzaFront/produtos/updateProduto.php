<?php
include '../functions.php';
$pdo = pdo_connect_pgsql();
$msg = '';
// Verifica se o ID do contato existe, por exemplo, update.php?id=1 irá obter o contato com o id 1
if (isset($_GET['id_produto'])) {
    if (!empty($_POST)) {
        // Esta parte é semelhante ao create.php, mas aqui estamos atualizando um registro e não inserindo
        $id_produto = isset($_POST['id_produto']) ? $_POST['id_produto'] : NULL;
        $nome = isset($_POST['nome_produto']) ? $_POST['nome_produto'] : '';
        $valor_produto = isset($_POST['valor_produto']) ? $_POST['valor_produto'] : '';
        $categoria = isset($_POST['categoria_produto']) ? $_POST['categoria_produto'] : '';
        $tamanho = isset($_POST['tamanho']) ? $_POST['tamanho'] : '';
        $ingredientes = isset($_POST['ingredientes']) ? $_POST['ingredientes'] : '';
        // Atualiza o registro
        $stmt = $pdo->prepare('UPDATE produtos_pizzaria SET id_produto = ?, nome_produto = ?, valor_produto = ?, categoria_produto = ?, tamanho = ?, ingredientes = ? WHERE id_produto = ?');
        $stmt->execute([$id_produto, $nome, $valor_produto, $categoria, $tamanho, $ingredientes, $_GET['id_produto']]);
        $msg = 'Atualização Realizada com Sucesso!';
    }
    // Obter o contato da tabela contatoss
    $stmt = $pdo->prepare('SELECT * FROM produtos_pizzaria WHERE id_produto = ?');
    $stmt->execute([$_GET['id_produto']]);
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
	<h2>Atualizar Contato ---- <?=$contatos['id_produto']?></h2>
    <form action="updateProduto.php?id_produto=<?=$contatos['id_produto']?>" method="post">
        <label for="id_produto">ID</label>
        <label for="nome">Nome</label>  
        <input type="text" name="id_produto" placeholder="" value="<?=$contatos['id_produto']?>" id="id_produto" readonly>
        <input type="text" name="nome_produto" placeholder="Seu Nome" value="<?=$contatos['nome_produto']?>" id="nome_produto">
        <label for="valor">Valor</label>
        <label for="cel">Categoria</label>
        <input type="text" name="valor_produto" placeholder="R$ --,--" value="<?=$contatos['valor_produto']?>" id="valor_produto">
        <input type="text" name="categoria_produto" placeholder="(XX) X.XXXX-XXXX" value="<?=$contatos['categoria_produto']?>" id="categoria_produto">
        <label for="pizza">Tamanho</label>
        <label for="created">Ingredientes</label>
        <input type="text" name="tamanho" placeholder="tamanho" value="<?=$contatos['tamanho']?>" id="tamanho">
        <input type="text" name="ingredientes" value="<?=$contatos['ingredientes']?>" id="ingredientes">
        <input type="submit" value="Update">
        <a href="searchProdutos.php" class="create-contact">Voltar</a>
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>
</body>
</html>




<?=template_footer()?>