<?php
include '../functions.php';
$pdo = pdo_connect_pgsql();
$msg = '';

$agencias = $pdo->query('SELECT num_agencia, cidade FROM agencia');
if (!empty($_POST)) {
    $nome = isset($_POST['nome']) ? $_POST['nome'] : '';
    $cargo = isset($_POST['cargo']) ? $_POST['cargo'] : '';
    $salario = isset($_POST['salario']) ? $_POST['salario'] : '';
    $num_agencia = isset($_POST['num_agencia']) ? $_POST['num_agencia'] : '';

    try {
        $stmt = $pdo->prepare('INSERT INTO funcionarios (nome_funcionario, cargo_funcionario, salario_funcionario, num_agencia) VALUES (?, ?, ?, ?)');
        $stmt->execute([$nome, $cargo, $salario, $num_agencia]);
        $msg = 'Funcionário cadastrado com sucesso!';
    } catch (Exception $e) {
        $msg = $e;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?= template_head2("Cadastro de Funcionário") ?>
    <link rel="stylesheet" href="../css/styleCadastro.css">
</head>

<body>
    <?= template_header2() ?>
    <?= voltar("indexFuncionario.php") ?>
    <div class="content update">
        <h1 class="text-center">Cadastrar Funcionário</h1>
        <form action="createFuncionario.php" method="POST">
            <div class="form-group">
                <label for="nome">Nome:</label>
                <label for="cargo">Cargo:</label>
            </div>
            <div class="form-group">
                <input type="text" name="nome" id="nome" placeholder="Nome" required>
                <input type="text" name="cargo" placeholder="Cargo" id="cargo" required>
            </div>
            <div class="form-group">
                <label for="salario">Salário:</label>
                <label for="num_agencia">Número da Agência:</label>
            </div>
            <div class="form-group">
                <input type="number" name="salario" placeholder="Salário" id="salario" required>
                <select name="num_agencia" id="num_agencia" required>
                    <option value="">Selecione uma agência</option>
                    <?php foreach ($agencias as $agencia) : ?>
                        <option value="<?= $agencia['num_agencia'] ?>"><?= $agencia['num_agencia'] . ' - ' . $agencia['cidade'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <input type="submit" value="Cadastrar">
            </div>
        </form>
        <p><?= $msg ?></p>
    </div>
    <?= template_footer() ?>
</body>

</html>
