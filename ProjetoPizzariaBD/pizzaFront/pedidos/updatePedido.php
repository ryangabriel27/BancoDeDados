<?php
include '../functions.php';
$pdo = pdo_connect_pgsql();
$msg = '';
// Verifica se o ID do pedido existe, por exemplo, update.php?id=1 irá obter o pedido com o id 1
if (isset($_GET['id_pedido'])) {
    if (!empty($_POST)) {
        // Esta parte é semelhante ao create.php, mas aqui estamos atualizando um registro e não inserindo
        $id_pedido = isset($_POST['id_pedido']) ? $_POST['id_pedido'] : NULL;
        $cpf_cliente = isset($_POST['cpf_cliente']) ? $_POST['cpf_cliente'] : '';
        $codfun = isset($_POST['codfun']) ? $_POST['codfun'] : '';
        $tamanho_pizza = isset($_POST['tamanho_pizza']) ? $_POST['tamanho_pizza'] : '';
        $pizza = isset($_POST['pizza']) ? $_POST['pizza'] : '';
        $cadastro = isset($_POST['cadastro']) ? $_POST['cadastro'] : date('Y-m-d H:i:s');
        $status = isset($_POST['status_pedido']) ? $_POST['status_pedido'] : '';
        // Atualiza o registro
        $stmt = $pdo->prepare('UPDATE pedidos_pizzaria SET id_pedido = ?, cpf_cliente = ?, codfun = ?, tamanho_pizza = ?, pizza = ?, cadastro = ?, status_pedido = ? WHERE id_pedido = ?');
        $stmt->execute([$id_pedido, $cpf_cliente, $codfun, $tamanho_pizza, $pizza, $cadastro, $status, $_GET['id_pedido']]);
        $msg = 'Atualização Realizada com Sucesso!';
    }
    // Obter o pedido da tabela pedidoss
    $stmt = $pdo->prepare('SELECT * FROM pedidos_pizzaria WHERE id_pedido = ?');
    $stmt->execute([$_GET['id_pedido']]);
    $pedidos = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$pedidos) {
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
	<h2>Atualizar pedido ---- <?=$pedidos['id_pedido']?></h2>
    <form action="updatePedido.php?id_pedido=<?=$pedidos['id_pedido']?>" method="post">
        <label for="id_pedido">ID</label>
        <label for="cpf_cliente">Cliente</label>  
        <input type="text" name="id_pedido" placeholder="" value="<?=$pedidos['id_pedido']?>" id="id_pedido" readonly>
        <input type="text" name="cpf_cliente" placeholder="Seu cpf_cliente" value="<?=$pedidos['cpf_cliente']?>" id="cpf_cliente">
        <label for="codfun">Atendido por:</label>
        <label for="tamanho_pizza">Tamanho Pizza</label>
        <input type="text" name="codfun" placeholder="seucodfun@seuprovedor.com.br" value="<?=$pedidos['codfun']?>" id="codfun">
        <input type="text" name="tamanho_pizza" placeholder="(XX) X.XXXX-XXXX" value="<?=$pedidos['tamanho_pizza']?>" id="tamanho_pizza">
        <label for="pizza">Pizza</label>
        <label for="created">Criação</label>
        <input type="text" name="pizza" placeholder="Pizza" value="<?=$pedidos['pizza']?>" id="pizza">
        <input type="datetime-local" name="cadastro" value="<?=date('Y-m-d\TH:i', strtotime($pedidos['cadastro']))?>" id="cadastro">
        <label for="created">Status</label>
        <select name="status_pedido" id="status_pedido">
            <option value="EM ANDAMENTO" <?=($pedidos['status_pedido'] == 'EM ANDAMENTO') ? 'selected' : ''?>>EM ANDAMENTO</option>
            <option value="CANCELADO" <?=($pedidos['status_pedido'] == 'CANCELADO') ? 'selected' : ''?>>CANCELADO</option>
            <option value="FINALIZADO" <?=($pedidos['status_pedido'] == 'FINALIZADO') ? 'selected' : ''?>>FINALIZADO</option>
        </select>
        <input type="submit" value="Update">
        <a href="searchPedido.php" class="create-contact">Voltar</a>
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>
</body>
</html>

<?=template_footer()?>