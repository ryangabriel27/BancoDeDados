<?php
include '../functions.php';
$pdo = pdo_connect_pgsql();
$msg = '';
// Verifica se o ID do contato existe
if (isset($_GET['id_produto'])) {
    // Seleciona o registro que será deletado
    $stmt = $pdo->prepare('SELECT * FROM produtos_pizzaria WHERE id_produto = ?');
    $stmt->execute([$_GET['id_produto']]);
    $contact = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$contact) {
        exit('Pizza Não Localizada!');
    }
    // Certifique-se de que o usuário confirma antes da exclusão
    if (isset($_GET['confirm'])) {
        if ($_GET['confirm'] == 'yes') {
            // O usuário clicou no botão "Sim", deleta o registro
            $stmt = $pdo->prepare('DELETE FROM produtos_pizzaria WHERE id_produto = ?');
            $stmt->execute([$_GET['id_produto']]);
            $msg = 'Pizza Apagado com Sucesso!';
            $button = '<a href="searchProdutos.php" class="create-contact">Voltar</a>';
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
        <h2>Apagar Pizza ---- <?= $contact['nome_produto'] ?></h2>
        <?php if ($msg && $button) : ?>
            <p><?= $msg ?></p>
            <div><?= $button ?></div>
        <?php else : ?>
            <p>Você tem certeza que deseja apagar a pizza #<?= $contact['id_produto'] ?>?</p>
            <div class="yesno">
                <a href="deleteProduto.php?id_produto=<?= $contact['id_produto'] ?>&confirm=yes">Sim</a>
                <a href="deleteProduto.php?id_produto=<?= $contact['id_produto'] ?>&confirm=no">Não</a>
            </div>
        <?php endif; ?>
    </div>

</body>

</html>


<?= template_footer() ?>