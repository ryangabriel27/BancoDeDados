<?php
include '../functions.php';
$pdo = pdo_connect_pgsql();
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
$records_per_page = 10;

$stmt = $pdo->prepare('SELECT * FROM funcionarios ORDER BY id_funcionario OFFSET :offset LIMIT :limit');
$stmt->bindValue(':offset', ($page - 1) * $records_per_page, PDO::PARAM_INT);
$stmt->bindValue(':limit', $records_per_page, PDO::PARAM_INT);
$stmt->execute();
$funcionarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

$num_funcionarios = $pdo->query('SELECT COUNT(*) FROM funcionarios')->fetchColumn();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?= template_head2("Listar Funcionários") ?>
    <link rel="stylesheet" href="../css/styleCadastro.css">
    <link rel="stylesheet" href="../css/styleRead.css">
</head>

<body>
    <?= template_header2() ?>
    <?= voltar("indexFuncionario.php") ?>
    <div class="content read">
        <table>
            <thead>
                <tr>
                    <td>Id</td>
                    <td>Nome</td>
                    <td>Cargo</td>
                    <td>Salário</td>
                    <td>Número da Agência</td>
                    <td></td>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($funcionarios as $funcionario) : ?>
                    <tr>
                        <td><?= $funcionario['id_funcionario'] ?></td>
                        <td><?= $funcionario['nome_funcionario'] ?></td>
                        <td><?= $funcionario['cargo_funcionario'] ?></td>
                        <td><?= $funcionario['salario_funcionario'] ?></td>
                        <td><?= $funcionario['num_agencia'] ?></td>
                        <td class="actions">
                            <a href="updateFuncionario.php?id_funcionario=<?= $funcionario['id_funcionario'] ?>" class="edit"><i class="fas fa-pen fa-xs"></i></a>
                            <a href="deleteFuncionario.php?id_funcionario=<?= $funcionario['id_funcionario'] ?>" class="trash"><i class="fas fa-trash fa-xs"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="pagination">
            <?php if ($page > 1) : ?>
                <a href="readFuncionario.php?page=<?= $page - 1 ?>"><i class="fas fa-angle-double-left fa-sm"></i></a>
            <?php endif; ?>
            <?php if ($page * $records_per_page < $num_funcionarios) : ?>
                <a href="readFuncionario.php?page=<?= $page + 1 ?>"><i class="fas fa-angle-double-right fa-sm"></i></a>
            <?php endif; ?>
        </div>
    </div>
    <?= template_footer() ?>
</body>

</html>
