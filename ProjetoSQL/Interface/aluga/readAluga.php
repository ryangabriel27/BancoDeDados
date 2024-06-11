<?php
include '../functions.php';

// Conectar ao banco de dados PostgreSQL
$pdo = pdo_connect_pgsql();
// Obter a página via solicitação GET (parâmetro URL: page), se não existir, defina a página como 1 por padrão
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
// Número de registros para mostrar em cada página
$records_per_page = 10;

// Preparar a instrução SQL e obter registros da tabela clientes com os carros alugados
$stmt = $pdo->prepare('SELECT aluga.id_aluguel, clientes.nome AS cliente_nome, clientes.sobrenome AS cliente_sobrenome, carros.marca, carros.modelo, carros.placa, aluga.data_inicio, aluga.data_fim 
                        FROM aluga 
                        INNER JOIN clientes ON aluga.id_cliente = clientes.id_cliente 
                        INNER JOIN carros ON aluga.id_carro = carros.id_carro
                        ORDER BY clientes.id_cliente OFFSET :offset LIMIT :limit');
$stmt->bindValue(':offset', ($page - 1) * $records_per_page, PDO::PARAM_INT);
$stmt->bindValue(':limit', $records_per_page, PDO::PARAM_INT);
$stmt->execute();
// Buscar os registros para exibi-los em nosso modelo.
$alugueis = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Obter o número total de registros, isso é para determinar se deve haver um botão de próxima e anterior
$num_records = $pdo->query('SELECT COUNT(*) FROM aluga')->fetchColumn();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?= template_head2("Listar Clientes e Carros Alugados") ?>
    <link rel="stylesheet" href="../css/styleCadastro.css">
    <link rel="stylesheet" href="../css/styleRead.css">
</head>

<body>
    <?= template_header2() ?>
    <?= voltar("indexAluga.php") ?>
    <div class="content read">
        <table>
            <thead>
                <tr>
                    <td>Nome do cliente</td>
                    <td>Sobrenome do cliente</td>
                    <td>Marca</td>
                    <td>Modelo</td>
                    <td>Placa</td>
                    <td>Data de Início</td>
                    <td>Data de Fim</td>
                    <td></td>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($alugueis as $aluguel) : ?>
                    <tr>
                        <td><?= $aluguel['cliente_nome'] ?></td>
                        <td><?= $aluguel['cliente_sobrenome'] ?></td>
                        <td><?= $aluguel['marca'] ?></td>
                        <td><?= $aluguel['modelo'] ?></td>
                        <td><?= $aluguel['placa'] ?></td>
                        <td><?= $aluguel['data_inicio'] ?></td>
                        <td><?= $aluguel['data_fim'] ?></td>
                        <td class="actions">
                            <a href="updateAluga.php?id_aluguel=<?= $aluguel['id_aluguel'] ?>" class="edit"><i class="fas fa-pen fa-xs"></i></a>
                            <a href="deleteAluga.php?id_aluguel=<?= $aluguel['id_aluguel'] ?>" class="trash"><i class="fas fa-trash fa-xs"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="pagination">
            <?php if ($page > 1) : ?>
                <a href="readAluga.php?page=<?= $page - 1 ?>"><i class="fas fa-angle-double-left fa-sm"></i></a>
            <?php endif; ?>
            <?php if ($page * $records_per_page < $num_records) : ?>
                <a href="readAluga.php?page=<?= $page + 1 ?>"><i class="fas fa-angle-double-right fa-sm"></i></a>
            <?php endif; ?>
        </div>
    </div>
    <?= template_footer() ?>
</body>

</html>