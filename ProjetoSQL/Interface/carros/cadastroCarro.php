<?php
include '../functions.php';
$pdo = pdo_connect_pgsql();
$msg = '';

if (!empty($_POST)) {
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
        $stmt = $pdo->prepare('INSERT INTO carros (marca, modelo, placa, ano, status, cor, valor_carro, disponibilidade,num_agencia) VALUES (?,?, ?, ?, ?, ?, ?, ?, ?)');
        $stmt->execute([$marca, $modelo, $placa, $ano, $status, $cor, $valor_carro, $disponibilidade, $num_agencia]);
        $msg = 'Carro cadastrado com sucesso!';
    } catch (Exception $e) {
        $msg = $e;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?= template_head2("Cadastro") ?>
    <link rel="stylesheet" href="../css/styleCadastro.css">
</head>

<body>
    <?= template_header2() ?>
    <?= voltar("indexCarros.php") ?>
    <div class="content update">
        <h1 class="text-center">Cadastrar carro</h1>
        <form action="cadastroCarro.php" method="POST">
            <div class="form-group">
                <label for="marca">Marca:</label>
                <label for="modelo">Modelo:</label>
            </div>
            <div class="form-group">
                <input type="text" id="marca" name="marca" required>
                <input type="text" id="modelo" name="modelo" required>
            </div>
            <div class="form-group">
                <label for="placa">Placa:</label>
                <label for="ano">Ano:</label>
            </div>
            <div class="form-group">
                <input type="text" id="placa" name="placa" required>
                <input type="number" id="ano" name="ano" required>
            </div>
            <div class="form-group">
                <label for="cor">Cor:</label>
                <label for="valor_carro">Valor do carro:</label>
            </div>
            <div class="form-group">
                <input type="text" id="cor" name="cor" required>
                <input type="number" id="valor_carro" name="valor_carro" required>
            </div>
            <div class="form-group">
                <label for="disponibilidade">Disponibilidade:</label>
                <label for="status">Status:</label>
            </div>
            <div class="form-group">
                <select name="disponibilidade" id="disponibilidade" required>
                    <option value="DISPONIVEL">DISPONIVEL</option>
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
                <input type="text" id="num_agencia" name="num_agencia" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Cadastrar">
            </div>
        </form>
        <p><?= $msg ?></p>
    </div>
</body>

</html>