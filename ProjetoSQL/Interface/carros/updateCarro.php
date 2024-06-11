<?php
include '../functions.php';
$pdo = pdo_connect_pgsql();
$msg = '';
// Verifica se o ID do contato existe, por exemplo, update.php?id=1 irá obter o contato com o id 1
if (isset($_GET['id_carro'])) {
    if (!empty($_POST)) {
        // Esta parte é semelhante ao create.php, mas aqui estamos atualizando um registro e não inserindo
        $marca = isset($_POST['marca']) ? $_POST['marca'] : '';
        $modelo = isset($_POST['modelo']) ? $_POST['modelo'] : '';
        $placa = isset($_POST['placa']) ? $_POST['placa'] : '';
        $ano = isset($_POST['ano']) ? $_POST['ano'] : '';
        $status = isset($_POST['status']) ? $_POST['status'] : ''; // Valor padrão para status
        $cor = isset($_POST['cor']) ? $_POST['cor'] : '';
        $valor_carro = isset($_POST['valor_carro']) ? $_POST['valor_carro'] : '';
        $disponibilidade = isset($_POST['disponibilidade']) ? $_POST['disponibilidade'] : ''; // Valor padrão para disponibilidade
        $num_agencia = isset($_POST['num_agencia']) ? $_POST['num_agencia'] : ''; // Valor padrão para disponibilidade

        try {
            $stmt = $pdo->prepare('UPDATE carros SET marca = ?, modelo = ? , placa = ?, ano = ?, status = ?, cor = ?, valor_carro = ?, disponibilidade = ?,num_agencia = ? WHERE id_carro = ?');
            $stmt->execute([$marca, $modelo, $placa, $ano, $status, $cor, $valor_carro, $disponibilidade, $num_agencia, $_GET['id_carro']]);
            $msg = 'Carro atualizado com sucesso!';
            $button = '<a href="searchCarros.php" class="create-contact">Voltar</a>';
        } catch (Exception $e) {
            $msg = $e;
        }
    }
    // Obter o contato da tabela contatoss
    $stmt = $pdo->prepare('SELECT * FROM carros WHERE id_carro = ?');
    $stmt->execute([$_GET['id_carro']]);
    $contatos = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$contatos) {
        exit('Carro Não Localizado!');
    }
} else {
    exit('Nenhum carro Especificado!');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?= template_head2('Editar Carro') ?>
    <link rel="stylesheet" href="../css/styleCadastro.css">
    <link rel="stylesheet" href="../css/styleRead.css">
</head>

<body>
    <?= template_header2() ?>
    <?= voltar("indexCarros.php") ?>
    <div class="content update">
        <h2>Atualizar Carro ---- <?= $contatos['modelo'] ?></h2>
        <form action="updateCarro.php?id_carro=<?= $contatos['id_carro'] ?>" method="post">
            <div class="form-group">
                <label for="marca">Marca:</label>
                <label for="modelo">Modelo:</label>
            </div>
            <div class="form-group">
                <input type="text" id="marca" name="marca" value="<?= $contatos['marca'] ?>" required readonly>
                <input type="text" id="modelo" name="modelo" value="<?= $contatos['modelo'] ?>" required readonly>
            </div>
            <div class="form-group">
                <label for="placa">Placa:</label>
                <label for="ano">Ano:</label>
            </div>
            <div class="form-group">
                <input type="text" id="placa" name="placa" value="<?= $contatos['placa'] ?>" required>
                <input type="number" id="ano" name="ano" value="<?= $contatos['ano'] ?>" required>
            </div>
            <div class="form-group">
                <label for="cor">Cor:</label>
                <label for="valor_carro">Valor do carro:</label>
            </div>
            <div class="form-group">
                <input type="text" id="cor" name="cor" value="<?= $contatos['cor'] ?>" required>
                <input type="number" id="valor_carro" name="valor_carro" value="<?= $contatos['valor_carro'] ?>" required>
            </div>
            <div class="form-group">
                <label for="disponibilidade">Disponibilidade:</label>
                <label for="status">Status:</label>
            </div>
            <div class="form-group">
                <select name="disponibilidade" id="disponibilidade" required>
                    <option value="DISPONIVEL">DISPONIVEL</option>
                    <option value="ALUGADO">ALUGADO</option>
                    <option value="RESERVADO">RESERVADO</option>
                </select>
                <select name="status" id="status" required>
                    <option value="BOM">BOM</option>
                    <option value="EM MANUTENCAO">EM MANUTENCAO</option>
                    <option value="NECESSARIO MANUTENCAO">NECESSARIO MANUTENCAO</option>
                </select>
            </div>
            <div class="form-group">
                <label for="num_agencia">Numero da agência:</label>
            </div>
            <div class="form-group">
                <input type="text" id="num_agencia" name="num_agencia" value="<?= $contatos['num_agencia'] ?>" required>
                <input type="submit" value="Atualizar">
            </div>
        </form>
        <?php if ($msg) : ?>
            <p><?= $msg ?></p>
            <div><?=$button?></div>
        <?php endif; ?>
    </div>

    <?= template_footer() ?>
</body>

</html>