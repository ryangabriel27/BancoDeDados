<?php
include '../functions.php';

// Conectar ao banco de dados PostgreSQL
$pdo = pdo_connect_pgsql();
// Obter a página via solicitação GET (parâmetro URL: page), se não existir, defina a página como 1 por padrão
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
// Número de registros para mostrar em cada página
$records_per_page = 8;

$data_fim = '';
$data_inicio = '';

if (isset($_GET['data_inicio']) && isset($_GET['data_fim'])) {
    $data_inicio = $_GET['data_inicio'];
    $data_fim = $_GET['data_fim'];
    $sql = 'SELECT aluga.id_aluguel, clientes.nome AS cliente_nome, clientes.sobrenome AS cliente_sobrenome, carros.marca, carros.modelo, carros.placa, aluga.data_inicio, aluga.data_fim FROM aluga 
    INNER JOIN clientes ON aluga.id_cliente = clientes.id_cliente 
    INNER JOIN carros ON aluga.id_carro = carros.id_carro
    WHERE data_inicio >= :data_inicio AND data_fim <= :data_fim ORDER BY data_inicio OFFSET :offset LIMIT :limit';
} else {
    $sql = 'SELECT aluga.id_aluguel, clientes.nome AS cliente_nome, clientes.sobrenome AS cliente_sobrenome, carros.marca, carros.modelo, carros.placa, aluga.data_inicio, aluga.data_fim FROM aluga 
    INNER JOIN clientes ON aluga.id_cliente = clientes.id_cliente 
    INNER JOIN carros ON aluga.id_carro = carros.id_carro
    ORDER BY id_aluguel OFFSET :offset LIMIT :limit';
}

$stmt = $pdo->prepare($sql);

if (isset($_GET['data_inicio']) && isset($_GET['data_fim'])) {
    $stmt->bindParam(':data_inicio', $data_inicio);
    $stmt->bindParam(':data_fim', $data_fim);
}
$stmt->bindValue(':offset', ($page - 1) * $records_per_page, PDO::PARAM_INT);
$stmt->bindValue(':limit', $records_per_page, PDO::PARAM_INT);
$stmt->execute();
$alugueis = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Obter o número total de registros, isso é para determinar se deve haver um botão de próxima e anterior
$num_alugueis = $pdo->query('SELECT COUNT(*) FROM aluga')->fetchColumn();
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
                    <td>Id aluguel</td>
                    <td>Nome do cliente</td>
                    <td>Sobrenome do cliente</td>
                    <td>Marca</td>
                    <td>Modelo</td>
                    <td>Placa</td>
                    <td>Data de Início</td>
                    <td>Data de Fim</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($alugueis as $aluguel) : ?>
                    <tr>
                        <td><?= $aluguel['id_aluguel'] ?></td>
                        <td><?= $aluguel['cliente_nome'] ?></td>
                        <td><?= $aluguel['cliente_sobrenome'] ?></td>
                        <td><?= $aluguel['marca'] ?></td>
                        <td><?= $aluguel['modelo'] ?></td>
                        <td><?= $aluguel['placa'] ?></td>
                        <td><?= $aluguel['data_inicio'] ?></td>
                        <td><?= $aluguel['data_fim'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="pagination">
            <?php if ($page > 1) : ?>
                <a href="searchAluga.php?page=<?= $page - 1 ?>&data_inicio=<?= urlencode(isset($_GET['data_inicio']) ? $_GET['data_inicio'] : '') ?>&data_fim=<?= urlencode(isset($_GET['data_fim']) ? $_GET['data_fim'] : '') ?>"><i class="fas fa-angle-double-left fa-sm"></i></a>
            <?php endif; ?>
            <?php if ($page * $records_per_page < $num_alugueis) : ?>
                <a href="searchAluga.php?page=<?= $page + 1 ?>&data_inicio=<?= urlencode(isset($_GET['data_inicio']) ? $_GET['data_inicio'] : '') ?>&data_fim=<?= urlencode(isset($_GET['data_fim']) ? $_GET['data_fim'] : '') ?>"><i class="fas fa-angle-double-right fa-sm"></i></a>
            <?php endif; ?>
        </div>
    </div>
    <?= template_footer() ?>
</body>

</html>