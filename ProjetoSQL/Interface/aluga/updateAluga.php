<?php
include '../functions.php';
$pdo = pdo_connect_pgsql();
$msg = '';

// Verifica se o ID do carro existe
if (isset($_GET['id_aluguel'])) {
    if (!empty($_POST)) {
        $valor_total = isset($_POST['valor_total']) ? $_POST['valor_total'] : '';
        $id_cliente = isset($_POST['id_cliente']) ? $_POST['id_cliente'] : '';
        $id_carro = isset($_POST['id_carro']) ? $_POST['id_carro'] : '';
        $data_inicio = isset($_POST['data_inicio']) ? $_POST['data_inicio'] : '';
        $data_fim = isset($_POST['data_fim']) ? $_POST['data_fim'] : '';

        try {
            $stmt = $pdo->prepare('UPDATE aluga SET valor_total = ?, id_cliente = ?, data_inicio = ?, data_fim = ?, id_carro = ? WHERE id_aluguel = ?');
            $stmt->execute([$valor_total, $id_cliente, $data_inicio, $data_fim, $id_carro, $_GET['id_aluguel']]);
            $msg = 'Aluguel atualizado com sucesso!';
            $button = '<a href="readAluga.php" class="create-contact">Voltar</a>';
        } catch (Exception $e) {
            $msg = 'Erro: ' . $e->getMessage();
        }
    }

    // Obter os detalhes do aluguel da tabela aluga
    $stmt = $pdo->prepare('SELECT * FROM aluga WHERE id_aluguel = ?');
    $stmt->execute([$_GET['id_aluguel']]);
    $aluguel = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$aluguel) {
        exit('Aluguel não encontrado!');
    }
} else {
    exit('Nenhum carro especificado!');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?= template_head2('Editar Aluguel') ?>
    <link rel="stylesheet" href="../css/styleCadastro.css">
    <link rel="stylesheet" href="../css/styleRead.css">
</head>

<body>
    <?= template_header2() ?>
    <?= voltar("indexAluga.php") ?>
    <div class="content update">
        <h2>Atualizar Aluguel para Carro - <?= $aluguel['id_carro'] ?></h2>
        <form action="updateAluga.php?id_aluguel=<?= $_GET['id_aluguel'] ?>" method="post">
            <div class="form-group">
                <label for="valor_total">Valor Total:</label>
                <input type="text" id="valor_total" name="valor_total" value="<?= $aluguel['valor_total'] ?>" required>
            </div>
            <div class="form-group">
                <label for="id_cliente">ID Cliente:</label>
                <input type="text" id="id_cliente" name="id_cliente" value="<?= $aluguel['id_cliente'] ?>" required readonly>
            </div>
            <div class="form-group">
                <label for="id_carro">ID carro:</label>
                <input type="text" id="id_carro" name="id_carro" value="<?= $aluguel['id_carro'] ?>" required readonly>
            </div>
            <div class="form-group">
                <label for="data_inicio">Data de Início:</label>
                <input type="date" id="data_inicio" name="data_inicio" value="<?= $aluguel['data_inicio'] ?>" required>
            </div>
            <div class="form-group">
                <label for="data_fim">Data de Fim:</label>
                <input type="date" id="data_fim" name="data_fim" value="<?= $aluguel['data_fim'] ?>" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Atualizar">
            </div>
        </form>
        <?php if ($msg) : ?>
            <p><?= $msg ?></p>
            <div><?= $button ?></div>
        <?php endif; ?>
    </div>

    <?= template_footer() ?>
</body>

</html>