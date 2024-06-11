<?php
include '../functions.php';
$pdo = pdo_connect_pgsql();
$msg = '';

if (isset($_GET['id_funcionario'])) {
    $stmt = $pdo->prepare('SELECT * FROM funcionarios WHERE id_funcionario = ?');
    $stmt->execute([$_GET['id_funcionario']]);
    $funcionario = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$funcionario) {
        exit('Funcionário não encontrado!');
    }

    if (isset($_GET['confirm'])) {
        if ($_GET['confirm'] == 'yes') {
            $stmt = $pdo->prepare('DELETE FROM funcionarios WHERE id_funcionario = ?');
            $stmt->execute([$_GET['id_funcionario']]);
            $msg = 'Funcionário apagado com sucesso!';
            $button = '<a href="readFuncionario.php" class="create-contact">Voltar</a>';
        } else {
            header('Location: readFuncionario.php');
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
    <?= template_head2('Deletar Funcionário') ?>
    <link rel="stylesheet" href="../css/styleCadastro.css">
    <link rel="stylesheet" href="../css/styleRead.css">
</head>

<body>

    <?= template_header2() ?>
    <?= voltar("indexFuncionario.php") ?>
    <div class="content delete">
        <h2>Excluir funcionário ---- <?= $funcionario['nome_funcionario'] ?></h2>
        <?php if ($msg && $button) : ?>
            <p><?= $msg ?></p>
            <div><?= $button ?></div>
        <?php else : ?>
            <p>Você tem certeza que deseja apagar o funcionário #<?= $funcionario['id_funcionario'] ?>?</p>
            <div class="yesno">
                <a href="deleteFuncionario.php?id_funcionario=<?= $funcionario['id_funcionario'] ?>&confirm=yes">Sim</a>
                <a href="deleteFuncionario.php?id_funcionario=<?= $funcionario['id_funcionario'] ?>&confirm=no">Não</a>
            </div>
        <?php endif; ?>
    </div>

</body>

</html>
