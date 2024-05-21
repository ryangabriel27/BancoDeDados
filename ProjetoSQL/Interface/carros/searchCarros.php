<?php
include '../functions.php';

// Conectar ao banco de dados PostgreSQL
$pdo = pdo_connect_pgsql();
// Obter a página via solicitação GET (parâmetro URL: page), se não existir, defina a página como 1 por padrão
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
// Número de registros para mostrar em cada página
$records_per_page = 8;

// Obter o valor do filtro de disponibilidade
$disponibilidade = isset($_GET['disponibilidade']) ? $_GET['disponibilidade'] : '';

// Preparar a instrução SQL e obter registros da tabela carros, com ou sem o filtro de disponibilidade
if ($disponibilidade) {
    $stmt = $pdo->prepare('SELECT * FROM carros WHERE disponibilidade = :disponibilidade ORDER BY id_carro OFFSET :offset LIMIT :limit');
    $stmt->bindValue(':disponibilidade', $disponibilidade, PDO::PARAM_STR);
} else {
    $stmt = $pdo->prepare('SELECT * FROM carros ORDER BY id_carro OFFSET :offset LIMIT :limit');
}
$stmt->bindValue(':offset', ($page - 1) * $records_per_page, PDO::PARAM_INT);
$stmt->bindValue(':limit', $records_per_page, PDO::PARAM_INT);
$stmt->execute();
// Buscar os registros para exibi-los em nosso modelo.
$contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Obter o número total de contatos, considerando ou não o filtro de disponibilidade
if ($disponibilidade) {
    $count_stmt = $pdo->prepare('SELECT COUNT(*) FROM carros WHERE disponibilidade = :disponibilidade');
    $count_stmt->bindValue(':disponibilidade', $disponibilidade, PDO::PARAM_STR);
} else {
    $count_stmt = $pdo->prepare('SELECT COUNT(*) FROM carros');
}
$count_stmt->execute();
$num_contacts = $count_stmt->fetchColumn();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?= template_head2("Listar Carros") ?>
    <link rel="stylesheet" href="../css/styleCadastro.css">
    <link rel="stylesheet" href="../css/styleRead.css">
</head>

<body>
    <?= template_header2() ?>
    <?= voltar("indexCarros.php") ?>
    <div class="content read">
        <form action="" method="get">
            <label for="disponibilidade">Filtrar por disponibilidade:</label>
            <select name="disponibilidade" id="disponibilidade">
                <option value="">Todos</option>
                <option value="DISPONIVEL" <?= isset($_GET['disponibilidade']) && $_GET['disponibilidade'] == 'DISPONIVEL' ? 'selected' : '' ?>>Disponível</option>
                <option value="ALUGADO" <?= isset($_GET['disponibilidade']) && $_GET['disponibilidade'] == 'ALUGADO' ? 'selected' : '' ?>>Alugado</option>
            </select>
            <input type="submit" value="Filtrar">
        </form>

        <table>
            <thead>
                <tr>
                    <td>Id</td>
                    <td>Marca</td>
                    <td>Modelo</td>
                    <td>Ano</td>
                    <td>Placa</td>
                    <td>Status</td>
                    <td>Disponibilidade</td>
                    <td></td>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($contacts as $contact) : ?>
                    <tr>
                        <td><?= $contact['id_carro'] ?></td>
                        <td><?= $contact['marca'] ?></td>
                        <td><?= $contact['modelo'] ?></td>
                        <td><?= $contact['ano'] ?></td>
                        <td><?= $contact['placa'] ?></td>
                        <td><?= $contact['status'] ?></td>
                        <td><?= $contact['disponibilidade'] ?></td>
                        <td class="actions">
                            <a href="updateCarro.php?id_carro=<?= $contact['id_carro'] ?>" class="edit"><i class="fas fa-pen fa-xs"></i></a>
                            <a href="deleteCarro.php?id_carro=<?= $contact['id_carro'] ?>" class="trash"><i class="fas fa-trash fa-xs"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="pagination">
            <?php if ($page > 1) : ?>
                <a href="searchCarros.php?page=<?= $page - 1 ?>&disponibilidade=<?= urlencode(isset($_GET['disponibilidade']) ? $_GET['disponibilidade'] : '') ?>"><i class="fas fa-angle-double-left fa-sm"></i></a>
            <?php endif; ?>
            <?php if ($page * $records_per_page < $num_contacts) : ?>
                <a href="searchCarros.php?page=<?= $page + 1 ?>&disponibilidade=<?= urlencode(isset($_GET['disponibilidade']) ? $_GET['disponibilidade'] : '') ?>"><i class="fas fa-angle-double-right fa-sm"></i></a>
            <?php endif; ?>
        </div>
    </div>
    <?= template_footer() ?>
</body>

</html>