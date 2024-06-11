<?php
include '../functions.php';
$pdo = pdo_connect_pgsql();
$msg = '';

$carros = $pdo->query("SELECT id_carro, marca, modelo FROM carros WHERE disponibilidade = 'DISPONIVEL' AND status = 'BOM'")->fetchAll(PDO::FETCH_ASSOC);
$clientes = $pdo->query('SELECT id_cliente, nome, sobrenome FROM clientes')->fetchAll(PDO::FETCH_ASSOC);

if (!empty($_POST)) {
    $valor_total = isset($_POST['valor_total']) ? $_POST['valor_total'] : '';
    $id_carro = isset($_POST['id_carro']) ? $_POST['id_carro'] : '';
    $id_cliente = isset($_POST['id_cliente']) ? $_POST['id_cliente'] : '';
    $data_inicio = isset($_POST['data_inicio']) ? $_POST['data_inicio'] : '';
    $data_fim = isset($_POST['data_fim']) ? $_POST['data_fim'] : '';

    if ($valor_total > 0 && !empty($id_carro) && !empty($id_cliente) && !empty($data_inicio) && !empty($data_fim)) {
        try {
            // Begin transaction
            $pdo->beginTransaction();

            // Insert into aluga
            $stmt = $pdo->prepare('INSERT INTO aluga (valor_total, id_carro, id_cliente, data_inicio, data_fim) VALUES (?, ?, ?, ?, ?)');
            $stmt->execute([$valor_total, $id_carro, $id_cliente, $data_inicio, $data_fim]);

            // Update disponibilidade in carros
            $stmt = $pdo->prepare('UPDATE carros SET disponibilidade = ? WHERE id_carro = ?');
            $stmt->execute(['ALUGADO', $id_carro]);

            // Commit transaction
            $pdo->commit();

            $msg = 'Aluguel registrado com sucesso e disponibilidade do carro atualizada para ALUGADO!';
        } catch (Exception $e) {
            // Rollback transaction in case of error
            $pdo->rollBack();
            $msg = 'Erro: ' . $e->getMessage();
        }
    } else {
        $msg = 'Por favor, preencha todos os campos e certifique-se de que o valor total seja maior que 0.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?= template_head2("Cadastro de Aluguel") ?>
    <link rel="stylesheet" href="../css/styleCadastro.css">
</head>

<body>
    <?= template_header2() ?>
    <?= voltar("indexAluga.php") ?>
    <div class="content update">
        <h1 class="text-center">Cadastrar Aluguel</h1>
        <form action="createAluga.php" method="POST">
            <div class="form-group">
                <label for="valor_total">Valor Total:</label>
                <input type="number" id="valor_total" name="valor_total" required>
            </div>
            <div class="form-group">
                <label for="id_carro">ID do Carro:</label>
                <select name="id_carro" id="id_carro" required>
                    <option value="">Selecione um carro</option>
                    <?php foreach ($carros as $carro) : ?>
                        <option value="<?= $carro['id_carro'] ?>"><?= $carro['marca'] . ' ' . $carro['modelo'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="id_cliente">ID do Cliente:</label>
                <select name="id_cliente" id="id_cliente" required>
                    <option value="">Selecione um cliente</option>
                    <?php foreach ($clientes as $cliente) : ?>
                        <option value="<?= $cliente['id_cliente'] ?>"><?= $cliente['nome'] . ' ' . $cliente['sobrenome'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="data_inicio">Data de Início:</label>
                <input type="date" id="data_inicio" name="data_inicio" required>
            </div>
            <div class="form-group">
                <label for="data_fim">Data de Fim:</label>
                <input type="date" id="data_fim" name="data_fim" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Cadastrar">
            </div>
        </form>
        <p><?= $msg ?></p>
    </div>
</body>

</html>