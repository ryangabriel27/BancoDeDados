<?php
include '../functions.php';

// Conectar ao banco de dados PostgreSQL
$pdo = pdo_connect_pgsql();
// Obter a página via solicitação GET (parâmetro URL: page), se não existir, defina a página como 1 por padrão
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
// Número de registros para mostrar em cada página
$records_per_page = 8;

// Obter os valores dos filtros de data
$data_inicio = $_GET['data_inicio'] ?? '';
$data_fim = $_GET['data_fim'] ?? '';

// Preparar a instrução SQL base
$sql = 'SELECT * FROM aluga';
$count_sql = 'SELECT COUNT(*) FROM aluga';
$params = [];
$count_params = [];

// Adicionar condições de filtro, se aplicáveis
if ($data_inicio || $data_fim) {
    $conditions = [];
    if ($data_inicio) {
        $conditions[] = 'data_inicio >= :data_inicio';
        $params[':data_inicio'] = $data_inicio;
        $count_params[':data_inicio'] = $data_inicio;
    }
    if ($data_fim) {
        $conditions[] = 'data_fim <= :data_fim';
        $params[':data_fim'] = $data_fim;
        $count_params[':data_fim'] = $data_fim;
    }
    $sql .= ' WHERE ' . implode(' AND ', $conditions);
    $count_sql .= ' WHERE ' . implode(' AND ', $conditions);
}

$sql .= ' ORDER BY id_aluguel OFFSET :offset LIMIT :limit';
$params[':offset'] = ($page - 1) * $records_per_page;
$params[':limit'] = $records_per_page;

$stmt = $pdo->prepare($sql);
$stmt->execute($params);
$alugueis = $stmt->fetchAll(PDO::FETCH_ASSOC);

$count_stmt = $pdo->prepare($count_sql);
$count_stmt->execute($count_params);
$num_alugueis = $count_stmt->fetchColumn();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?= template_head2("Listar Aluguéis") ?>
    <link rel="stylesheet" href="../css/styleCadastro.css">
    <link rel="stylesheet" href="../css/styleRead.css">
</head>

<body>
    <?= template_header2() ?>
    <?= voltar("indexAluga.php") ?>
    <div class="content read">
        <form action="" method="get">
            <label for="data_inicio">Data Início:</label>
            <input type="date" name="data_inicio" id="data_inicio" value="<?= isset($_GET['data_inicio']) ? $_GET['data_inicio'] : '' ?>">
            <label for="data_fim">Data Fim:</label>
            <input type="date" name="data_fim" id="data_fim" value="<?= isset($_GET['data_fim']) ? $_GET['data_fim'] : '' ?>">
            <input type="submit" value="Filtrar">
        </form>

        <table>
            <thead>
                <tr>
                    <td>Id Aluguel</td>
                    <td>Data Início</td>
                    <td>Data Fim</td>
                    <td>Valor Total</td>
                    <td>Id Carro</td>
                    <td>Id Cliente</td>
                    <td></td>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($alugueis as $aluguel) : ?>
                    <tr>
                        <td><?= $aluguel['id_aluguel'] ?></td>
                        <td><?= $aluguel['data_inicio'] ?></td>
                        <td><?= $aluguel['data_fim'] ?></td>
                        <td><?= $aluguel['valor_total'] ?></td>
                        <td><?= $aluguel['id_carro'] ?></td>
                        <td><?= $aluguel['id_cliente'] ?></td>
                        <td class="actions">
                            <a href="updateAluguel.php?id_aluguel=<?= $aluguel['id_aluguel'] ?>" class="edit"><i class="fas fa-pen fa-xs"></i></a>
                            <a href="deleteAluguel.php?id_aluguel=<?= $aluguel['id_aluguel'] ?>" class="trash"><i class="fas fa-trash fa-xs"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="pagination">
            <?php if ($page > 1) : ?>
                <a href="readAluguel.php?page=<?= $page - 1 ?>&data_inicio=<?= urlencode(isset($_GET['data_inicio']) ? $_GET['data_inicio'] : '') ?>&data_fim=<?= urlencode(isset($_GET['data_fim']) ? $_GET['data_fim'] : '') ?>"><i class="fas fa-angle-double-left fa-sm"></i></a>
            <?php endif; ?>
            <?php if ($page * $records_per_page < $num_alugueis) : ?>
                <a href="readAluguel.php?page=<?= $page + 1 ?>&data_inicio=<?= urlencode(isset($_GET['data_inicio']) ? $_GET['data_inicio'] : '') ?>&data_fim=<?= urlencode(isset($_GET['data_fim']) ? $_GET['data_fim'] : '') ?>"><i class="fas fa-angle-double-right fa-sm"></i></a>
            <?php endif; ?>
        </div>
    </div>
    <?= template_footer() ?>
</body>

</html>