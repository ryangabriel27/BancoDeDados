<?php
include '../functions.php';
$pdo = pdo_connect_pgsql();
$msg = '';
// Verifica se o ID do contato existe
if (isset($_GET['id_aluguel'])) {
    // Seleciona o registro que será deletado
    $stmt = $pdo->prepare('SELECT * FROM aluga WHERE id_aluguel = ?');
    $stmt->execute([$_GET['id_aluguel']]);
    $contact = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$contact) {
        exit('Carro não encotrado!');
    }
    // Certifique-se de que o usuário confirma antes da exclusão
    if (isset($_GET['confirm'])) {
        if ($_GET['confirm'] == 'yes') {
            // O usuário clicou no botão "Sim", deleta o registro
            try {
                $stmt = $pdo->prepare('DELETE FROM aluga WHERE id_aluguel = ?');
                $stmt->execute([$_GET['id_aluguel']]);

                $stmt = $pdo->prepare('UPDATE carros SET disponibilidade = "DISPONIVEL" WHERE id_carro = ?');
                $stmt->execute([$contact['id_carro']]);
                $msg = 'Registro de aluguel Apagado com Sucesso!';
                $button = '<a href="readAluga.php" class="create-contact">Voltar</a>';
            } catch (Exception $e) {
                $msg = 'Erro ao deletar o registro';
                print($e);
            }
        } else {
            // O usuário clicou no botão "Não", redireciona de volta para a página de leitura
            header('Location: readAluga.php');
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
    <?= voltar("indexAluga.php") ?>
    <div class="content delete">
        <h2>Excluir registro ---- <?= $contact['id_aluguel'] ?></h2>
        <?php if ($msg && $button) : ?>
            <p><?= $msg ?></p>
            <div><?= $button ?></div>
        <?php else : ?>
            <p>Você tem certeza que deseja apagar o registro de aluguel #<?= $contact['id_aluguel'] ?>?</p>
            <div class="yesno">
                <a href="deleteAluga.php?id_aluguel=<?= $contact['id_aluguel'] ?>&confirm=yes">Sim</a>
                <a href="deleteAluga.php?id_aluguel=<?= $contact['id_aluguel'] ?>&confirm=no">Não</a>
            </div>
        <?php endif; ?>
    </div>

</body>

</html>


<?= template_footer() ?>