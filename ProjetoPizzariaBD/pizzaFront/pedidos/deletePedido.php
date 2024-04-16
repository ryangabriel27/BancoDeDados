<?php
include '../functions.php';
$pdo = pdo_connect_pgsql();
$msg = '';
// Verifica se o ID do contato existe
if (isset($_GET['id_pedido'])) {
    // Seleciona o registro que será deletado
    $stmt = $pdo->prepare('SELECT * FROM pedidos_pizzaria WHERE id_pedido = ?');
    $stmt->execute([$_GET['id_pedido']]);
    $contact = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$contact) {
        exit('pedido Não Localizado!');
    }
    // Certifique-se de que o usuário confirma antes da exclusão
    if (isset($_GET['confirm'])) {
        if ($_GET['confirm'] == 'yes') {
            // O usuário clicou no botão "Sim", deleta o registro
            $stmt = $pdo->prepare('DELETE FROM pedidos_pizzaria WHERE id_pedido = ?');
            $stmt->execute([$_GET['id_pedido']]);
            $msg = 'pedido Apagado com Sucesso!';
            $button = '<a href="searchPedido.php" class="create-contact">Voltar</a>';
        } else {
            // O usuário clicou no botão "Não", redireciona de volta para a página de leitura
            header('Location: searchPedido.php');
            exit;
        }
    }
} else {
    exit('Nenhum ID especificado!');
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

    <div class="content delete">

        <?= header2() ?>
        <h2>Apagar pedido ---- <?= $contact['id_pedido'] ?></h2>
        <?php if ($msg && $button) : ?>
            <p><?= $msg ?></p>
            <div><?= $button ?></div>
        <?php else : ?>
            <p>Você tem certeza que deseja apagar o pedido #<?= $contact['id_pedido'] ?>?</p>
            <div class="yesno">
                <a href="deletePedido.php?id_pedido=<?= $contact['id_pedido'] ?>&confirm=yes">Sim</a>
                <a href="deletePedido.php?id_pedido=<?= $contact['id_pedido'] ?>&confirm=no">Não</a>
            </div>
        <?php endif; ?>
    </div>

</body>

</html>


<?= template_footer() ?>