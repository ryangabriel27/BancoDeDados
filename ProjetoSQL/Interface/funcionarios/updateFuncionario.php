<?php
include '../functions.php';
$pdo = pdo_connect_pgsql();
$msg = '';

$agencias = $pdo->query('SELECT num_agencia, cidade FROM agencia');
if (isset($_GET['id_funcionario'])) {
    if (!empty($_POST)) {
        $nome = isset($_POST['nome']) ? $_POST['nome'] : '';
        $cargo = isset($_POST['cargo']) ? $_POST['cargo'] : '';
        $salario = isset($_POST['salario']) ? $_POST['salario'] : '';
        $num_agencia = isset($_POST['num_agencia']) ? $_POST['num_agencia'] : '';

        try {
            $stmt = $pdo->prepare('UPDATE funcionarios SET nome_funcionario = ?, cargo_funcionario = ?, salario_funcionario = ?, num_agencia = ? WHERE id_funcionario = ?');
            $stmt->execute([$nome, $cargo, $salario, $num_agencia, $_GET['id_funcionario']]);
            $msg = 'Funcionário atualizado com sucesso!';
            $button = '<a href="readFuncionario.php" class="create-contact">Voltar</a>';
        } catch (Exception $e) {
            $msg = $e;
        }
    }

    $stmt = $pdo->prepare('SELECT * FROM funcionarios WHERE id_funcionario = ?');
    $stmt->execute([$_GET['id_funcionario']]);
    $funcionario = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$funcionario) {
        exit('Funcionário não encontrado!');
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
    <?= template_head2('Editar Funcionário') ?>
    <link rel="stylesheet" href="../css/styleCadastro.css">
    <link rel="stylesheet" href="../css/styleRead.css">
</head>

<body>
    <?= template_header2() ?>
    <?= voltar("indexFuncionario.php") ?>
    <div class="content update">
        <h2>Atualizar Funcionário ---- <?= $funcionario['nome_funcionario'] ?></h2>
        <form action="updateFuncionario.php?id_funcionario=<?= $funcionario['id_funcionario'] ?>" method="post">
            <div class="form-group">
                <label for="nome">Nome:</label>
                <label for="cargo">Cargo:</label>
            </div>
            <div class="form-group">
                <input type="text" id="nome" name="nome" value="<?= $funcionario['nome_funcionario'] ?>" required>
                <input type="text" id="cargo" name="cargo" value="<?= $funcionario['cargo_funcionario'] ?>" required>
            </div>
            <div class="form-group">
                <label for="salario">Salário:</label>
                <label for="num_agencia">Número da Agência:</label>
            </div>
            <div class="form-group">
                <input type="number" id="salario" name="salario" value="<?= $funcionario['salario_funcionario'] ?>" required>
                <select name="num_agencia" id="num_agencia" required>
                    <option value="">Selecione uma agência</option>
                    <?php foreach ($agencias as $agencia) : ?>
                        <option value="<?= $agencia['num_agencia'] ?>"><?= $agencia['num_agencia'] . ' - ' . $agencia['cidade'] ?></option>
                    <?php endforeach; ?>
                </select>
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