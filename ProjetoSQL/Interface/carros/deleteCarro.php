<?php
include '../functions.php';
$pdo = pdo_connect_pgsql();
$msg = '';
// Verifica se o ID do contato existe
if (isset($_GET['id_carro'])) {
    // Seleciona o registro que será deletado
    $stmt = $pdo->prepare('SELECT * FROM carros WHERE id_carro = ?');
    $stmt->execute([$_GET['id_carro']]);
    $contact = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$contact) {
        exit('Carro não encotrado!');
    }
    // Certifique-se de que o usuário confirma antes da exclusão
    if (isset($_GET['confirm'])) {
        if ($_GET['confirm'] == 'yes') {
            // O usuário clicou no botão "Sim", deleta o registro
            $stmt = $pdo->prepare('DELETE FROM carros WHERE id_carro = ?');
            $stmt->execute([$_GET['id_carro']]);
            $msg = 'Carro Apagado com Sucesso!';
            $button = '<a href="searchCarros.php" class="create-contact">Voltar</a>';
        } else {
            // O usuário clicou no botão "Não", redireciona de volta para a página de leitura
            header('Location: searchCarros.php');
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
    <?= template_head2("Deletar Carros") ?>
    <link rel="stylesheet" href="../css/styleCadastro.css">
    <link rel="stylesheet" href="../css/styleRead.css">
</head>

<body>

    <?= template_header2() ?>
    <?= voltar("indexCarros.php") ?>
    <div class="content delete">
        <h2>Excluir carro ---- <?= $contact['modelo'] ?></h2>
        <?php if ($msg && $button) : ?>
            <p><?= $msg ?></p>
            <div><?= $button ?></div>
        <?php else : ?>
            <p>Você tem certeza que deseja apagar o carro #<?= $contact['id_carro'] ?>?</p>
            <div class="yesno">
                <a href="deleteCarro.php?id_carro=<?= $contact['id_carro'] ?>&confirm=yes">Sim</a>
                <a href="deleteCarro.php?id_carro=<?= $contact['id_carro'] ?>&confirm=no">Não</a>
            </div>
        <?php endif; ?>
    </div>

</body>

</html>


<?= template_footer() ?>