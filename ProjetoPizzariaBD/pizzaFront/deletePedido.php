<?php
include 'functions.php';
$pdo = pdo_connect_pgsql();
$msg = '';
// Verifica se o ID do contato existe
if (isset($_GET['id_contato'])) {
    // Seleciona o registro que será deletado
    $stmt = $pdo->prepare('SELECT * FROM contatos WHERE id_contato = ?');
    $stmt->execute([$_GET['id_contato']]);
    $contact = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$contact) {
        exit('Contato Não Localizado!');
    }
    // Certifique-se de que o usuário confirma antes da exclusão
    if (isset($_GET['confirm'])) {
        if ($_GET['confirm'] == 'yes') {
            // O usuário clicou no botão "Sim", deleta o registro
            $stmt = $pdo->prepare('DELETE FROM contatos WHERE id_contato = ?');
            $stmt->execute([$_GET['id_contato']]);
            $msg = 'Contato Apagado com Sucesso!';
            $button = '<a href="read.php" class="create-contact">Voltar</a>';
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
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="styleP.css">
</head>

<body>

    <div class="content delete">

        <?= header2() ?>
        <h2>Apagar Contato ---- <?= $contact['nome'] ?></h2>
        <?php if ($msg && $button) : ?>
            <p><?= $msg ?></p>
            <div><?= $button ?></div>
        <?php else : ?>
            <p>Você tem certeza que deseja apagar o contato #<?= $contact['id_contato'] ?>?</p>
            <div class="yesno">
                <a href="deletePedido.php?id_contato=<?= $contact['id_contato'] ?>&confirm=yes">Sim</a>
                <a href="deletePedido.php?id_contato=<?= $contact['id_contato'] ?>&confirm=no">Não</a>
            </div>
        <?php endif; ?>
    </div>

</body>

</html>


<?= template_footer() ?>